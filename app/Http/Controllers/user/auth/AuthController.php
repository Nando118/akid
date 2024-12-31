<?php

namespace App\Http\Controllers\user\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\user\auth\login\LoginPostRequest;
use App\Http\Requests\user\auth\register\RegisterPostRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Login method
    public function loginPost(LoginPostRequest $request)
    {
        // Rate limiting
        $key = 'login-attempts:' . $request->ip();
        if (RateLimiter::tooManyAttempts($key, 5)) {
            return redirect()->back()->with('alert', [
                'type' => 'error',
                'message' => 'Too many login attempts. Please try again later.'
            ]);
        }

        // Check if request is email or username
        $fieldType = filter_var($request->input("identifier"), FILTER_VALIDATE_EMAIL) ? "email" : "username";

        // Check if the user is authenticated
        if (Auth::attempt([$fieldType => $request->input("identifier"), "password" => $request->input("password")])) {
            // Clear rate limiting
            RateLimiter::clear($key);

            // Redirect to the intended page with success message
            return redirect()->route('home.index')->with('alert', [
                'type' => 'success',
                'message' => 'You have been logged in successfully!'
            ]);
        }

        // Increment rate limiting
        RateLimiter::hit($key, 60);

        // Redirect back with error message
        return redirect()->back()->with('alert', [
            'type' => 'error',
            'message' => 'Invalid credentials!'
        ]);
    }

    // Register method
    public function registerPost(RegisterPostRequest $request)
    {
        try {
            // DB Transaction begins
            DB::beginTransaction();

            // Create a new user
            $user = User::create([
                "username" => $request->input("username"),
                "email" => $request->input("email"),
                "password" => Hash::make($request->input("password")),
            ]);

            // Check if the user is created
            if (!$user) {
                // Log the error without sensitive data
                Log::error("Error while creating the user in AuthController@registerPost.");

                // If the user is not created, throw an exception
                return redirect()->back()->with('alert', [
                    'type' => 'error',
                    'message' => 'An error occurred while creating the account!'
                ]);
            }

            // Commit the transaction
            DB::commit();

            // Log in the user
            Auth::login($user);

            // Regenerate session to prevent session fixation
            $request->session()->regenerate();

            // Redirect to the intended page with success message
            return redirect()->route('home.index')->with('alert', [
                'type' => 'success',
                'message' => 'Your account has been created successfully!'
            ]);

        } catch (Exception $exception) {
            // Rollback if an exception occurs
            DB::rollBack();

            // Log the exception without sensitive data
            Log::error($exception->getMessage());

            // Give error message and redirect back
            return redirect()->back()->with('alert', [
                'type' => 'error',
                'message' => 'An error occurred while creating the account!'
            ]);
        }
    }

    // Logout method
    public function logout(Request $request)
    {
        // Logout the user
        Auth::logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the CSRF token
        $request->session()->regenerateToken();

        // Redirect to the home page
        return redirect()->route('home.index')->with('alert', [
            'type' => 'info',
            'message' => 'You have been logged out successfully!'
        ]);
    }
}

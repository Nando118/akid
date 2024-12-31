<?php

use App\Http\Controllers\user\auth\AuthController;
use App\Http\Controllers\user\home\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Routes accessible by both guests and authenticated users
Route::get('/', [HomeController::class, 'index'])->name('home.index');

// Guest middleware
Route::middleware(['guest'])->group(function () {
    // Sign in route
    Route::post('/sign-in', [AuthController::class, 'loginPost'])
        ->name('login.post')
        ->middleware('throttle:3,1');

    // Sign up route with rate limiting
    Route::post('/sign-up', [AuthController::class, 'registerPost'])
        ->name('register.post')
        ->middleware('throttle:3,1');
});

// Auth middleware
Route::middleware(['auth'])->group(function () {
    // Sign out route
    Route::get('/sign-out', [AuthController::class, 'logout'])->name('logout');
});

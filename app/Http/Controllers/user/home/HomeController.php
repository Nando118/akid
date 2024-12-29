<?php

namespace App\Http\Controllers\user\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Index method
    public function index()
    {
        return view('user.home.home');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;

class PagesController extends Controller
{
    public function __invoke()
    {
        // ...
    }
    public function dashboard()
    {
        return view('dashboard');
    }

    public function debt()
    {
        return view('debt');
    }

    public function profile()
    {
        return view('profile');
    }
    
    public function feedback()
    {
        return view('feedback');
    }
}
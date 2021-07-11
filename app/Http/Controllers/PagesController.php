<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Payable;
use App\Models\Receivable;
use App\Models\User;

class PagesController extends Controller
{
    public function __invoke()
    {
        // ...
    }
    
    public function dashboard()
    {
        
        $payable = Payable::where('created_at', Payable::max('created_at'))->orderBy('created_at','desc')->get();
        $receivable = Receivable::where('created_at', Receivable::max('created_at'))->orderBy('created_at','desc')->get();


        return view('dashboard')->with(compact('payable','receivable'));
    }

    public function __construct()
    {
        $this->middleware('auth');
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
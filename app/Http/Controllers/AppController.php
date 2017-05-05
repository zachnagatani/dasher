<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    /**
    * Show the app dashboard
    */
    public function index() {
        if (Auth::check()) {
            return view('index');
        }

        return redirect('home');
    }
}

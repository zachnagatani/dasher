<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class AppController extends Controller
{
    /**
    * Show the app dashboard
    */
    public function index() {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->role === 'admin') {
                return view('index');
            }

            return view('main');
        }

        return redirect('login');
    }
}

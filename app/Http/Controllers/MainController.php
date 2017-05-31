<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use DB;

class MainController extends Controller
{
    public function add(Request $request) {
        try {
            $user = Auth::user();
            $name = $user->name;
            $email = $user->email;
            $description = $request->input('description');

            DB::table('issues')->insert(
                array(
                    'customer_name' => $name,
                    'customer_email' => $email,
                    'description' => $description
                )
            );

            echo 'Issued has been submitted';
        } catch (Exception $e) {
            echo $e;
        }
    }
}

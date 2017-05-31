<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use DB;

class IssuesController extends Controller
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

    public function getAll(Request $request, Response $response) {
        $issues = json_decode(Db::table('issues')->get());
        $JSONissues = array('data' => array());

        foreach($issues as $issue) {
            array_push(
                $JSONissues['data'],
                array(
                    'id' => $issue->id,
                    'type' => 'issue',
                    'attributes' => array(
                        'customer-name' => $issue->customer_name,
                        'customer-email' => $issue->customer_email,
                        'description' => $issue->description,
                        'status' => $issue->status,
                        'opened-at' => $issue->opened_at,
                        'closed-at' => $issue->closed_at,
                        'handling-employee' => $issue->handling_employee
                    )
                )
            );
        }

        return response()->json($JSONissues);
    }
}

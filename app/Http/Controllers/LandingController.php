<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class LandingController extends Controller
{
    //
    public function index(Request $request)
    {
        # code...
        try {
            if (View::exists('home/landing')) {

                return view('home.landing');
            } else {
                abort('404');
            }
        } catch (Exception $ex) {

            #Activities::log('system', 'AuthController(index)', 'line ' . $ex->getLine(), $ex->getMessage(), 422);
            return [
                'status'  => False,
                'code'    => 422,
                'message' => 'Erreur : veuillez contacter l\'administrateur du système',
            ];
        }
    }
}

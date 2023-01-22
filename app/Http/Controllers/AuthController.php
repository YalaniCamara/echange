<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function login(Request $request)
    {
        try {
            $input = $request->all();

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'http://test.sauverexchange.com/api/v2/users/connect',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array('email' => $input['email'],'password' => $input['password']),
                CURLOPT_HTTPHEADER => array(
                    'Accept: application/json'
                ),
            ));
    
            $response = curl_exec($curl);
            curl_close($curl);
    
            $post = json_decode($response, true);

            if($post['status'] == 201){

                $credentials = $request->only('email', 'password');

                # ['email' => $input['email'], 'password' => $input['password']]

                dd(Auth::attempt($credentials));
            
                if (Auth::attempt(['email' => $input['email'], 'password' => $input['password']])) {
    
                    return $credentials;

                    $request->session()->regenerate();
    
                    Auth::logoutOtherDevices($input['password']);
    
                    return [
                        'status'  => true,
                        'code'    => $post['status']
                    ];
                }

            }

            if($post['status'] == 400){
                return [
                    'status'  => false,
                    'code'    => $post['status'],
                    'message' => $post['message']
                ];
            }

        } catch (Exception $ex) {

        }
    }
}

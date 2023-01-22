<?php

namespace App\Http\Controllers;

use App\Helpers\HelperGetFunction;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //

    public function register(Request $request)
    {
        # code...
        try {

            $input = $request->all();

            $datas = array();

            if($input['password'] != $input['confirm_password']){
                return [
                    'status'  => false,
                    'message' => "le mot de passe doit être identique à sa confirmation!"
                ];
                /* return response()->json([
                    'status'  => false,
                    'message' => "le mot de passe doit être identique à sa confirmation!"
                ], 404); */
            }


            $datas['name']     = $input['name'];
            $datas['email']    = $input['email'];
            $datas['password'] = $input['password'];

            $API_URL = 'http://test.sauverexchange.com/api/v2/';
            $url    = 'users/create';

            #$post = HelperGetFunction::post_cURL($API_URL, $url, $datas);
            
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'http://test.sauverexchange.com/api/v2/users/create',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => $datas,
                CURLOPT_HTTPHEADER => array(
                    'Accept: application/json'
                ),
            ));
    
            $response = curl_exec($curl);
            curl_close($curl);
    
            $post = json_decode($response, true);

            if($post['status'] == 201){
                return [
                    'status'  => true,
                    'code'    => $post['status'],
                    'message' => $post['message']
                ];
            }elseif($post['status'] == 400){
                return [
                    'status'  => false,
                    'code'    => $post['status'],
                    'message' => $post['message']
                ];
            }
        } catch (Exception $ex) {

        }

    }

    public function connect(Request $request)
    {
        try {
            $input = $request->all();

            $credentials = $request->only('email', 'password');

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
                CURLOPT_POSTFIELDS => $credentials,
                CURLOPT_HTTPHEADER => array(
                    'Accept: application/json'
                ),
            ));
    
            $response = curl_exec($curl);
            curl_close($curl);
    
            $post = json_decode($response, true);

            if($post['status'] == 400){
                return [
                    'status'  => false,
                    'code'    => $post['status'],
                    'message' => $post['message']
                ];
            }

            if($post['status'] == 201){

                $post_user = $post['users'];

                $user = User::whereRaw('email=?',[$input['email']])->first();

                

                if(!$user){
                    
                    $save = [
                        'name'     => $post_user['name'],
                        'email'    => $post_user['email'],
                        'password' => bcrypt($input['password']),
                        'api_key'  => $post_user['api_key'],
                        'level'    => $post_user['level'],
                        'status'   => $post_user['status'],
                    ];
        
                    $current = User::create($save);
                    if (Auth::attempt($credentials)) {

                        $request->session()->regenerate();
                        Auth::logoutOtherDevices($input['password']);
                        return [
                            'status' => true,
                            'user'   => Auth::user()
                        ];
                    }

                }else{
                    if (Auth::attempt($credentials)) {

                        $request->session()->regenerate();
                        Auth::logoutOtherDevices($input['password']);
                        return [
                            'status' => true,
                            'user'   => Auth::user()
                        ];
                    }
                }            

            }

        } catch (Exception $ex) {

        }
    }

    public function logout(Request $request)
    {
        try {
            if (Auth::check()) {

                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                // -- A tester
                //return redirect(url()->previous());

                return redirect()->route('landing');
            } else {
                return redirect()->route('landing');
            }
        } catch (Exception $ex) {

        }
    }

    public function authenticate($credentials, $request)
    {
        if (Auth::attempt($credentials)) {
    
            $request->session()->regenerate();

            #Auth::logoutOtherDevices($request->only('password'));

            return Auth::user();

            //return redirect()->intended('landing');
        }
    }
}

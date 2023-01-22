<?php

namespace App\Http\Controllers;

use App\Helpers\HelperGetFunction;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;

class OperationController extends Controller
{
    //

    public function index(Request $request)
    {

        if (View::exists('operations/index')) {
            if (Auth::check()) {
                
                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'http://test.sauverexchange.com/api/v2/transactions/get',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'GET',
                    CURLOPT_HTTPHEADER => array(
                        'Accept: application/json'
                    ),
                ));
        
                $responses = curl_exec($curl);
                curl_close($curl);
                $getTransactions = json_decode($responses, true);
                
                $curl1 = curl_init();

                curl_setopt_array($curl1, array(
                    CURLOPT_URL => 'http://test.sauverexchange.com/api/v2/pricing/get',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'GET',
                    CURLOPT_HTTPHEADER => array(
                        'Accept: application/json'
                    ),
                ));
        
                $responses1 = curl_exec($curl1);
                curl_close($curl1);
                $data_pricings = json_decode($responses1, true);
                $pricings = $data_pricings['pricings'][1];                

                
                return view('operations/index',[
                    'pricings'     => $pricings,
                    'transactions' => $getTransactions['transactions'],
                ]);
            
            } else
                return redirect()->route('landing');
        } else {
            abort('404');
        }

    }

    
    public function show(Request $request, $id)
    {
        if (View::exists('operations/show')) {
            if (Auth::check()) {

                $input =  $request->all();

                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'http://test.sauverexchange.com/api/v2/transactions/'.$id.'/get',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'GET',
                    CURLOPT_HTTPHEADER => array(
                        'Accept: application/json'
                    ),
                ));
        
                $responses = curl_exec($curl);
                curl_close($curl);
                $data = json_decode($responses, true);
                
                //return $data['transactions'];

                return view('operations/show',[
                    'transaction' => $data['transactions'],
                ]);
            
            } else
                return redirect()->route('landing');
        } else {
            abort('404');
        }        
    }


    public function update(Request $request)
    {
        try {

            $input = $request->all();

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'http://test.sauverexchange.com/api/v2/transactions/information/update',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array('id_transactions' => $input['id_transactions'],'value_cfa_agent' => $input['value_cfa_agent'], 'name_customers' => $input['name_customers'],'payement_mode' => $input['payement_mode']),
                CURLOPT_HTTPHEADER => array(
                    'Accept: application/json',
                    'X-api-key: 3ea3cd6ecf3f51540113b5f5d46c17a1956758adfaba13ba04056026bc60296b8271d508acd544d1041ad32a5cace62c816800cec0f95098fc4906efe2695ab9'
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

            if($post['status'] == 200){
            
                return [
                    'status'  => true,
                    'code'    => $post['status'],
                    'message' => $post['message']
                ];
            
            }

        } catch (Exception $ex) {

        }
    }


    public function authorization(Request $request)
    {
        try {

            $input = $request->all();

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'http://test.sauverexchange.com/api/v2/transactions/authorization/update',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array('id_transactions' => $input['id_transactions']),
                CURLOPT_HTTPHEADER => array(
                    'Accept: application/json',
                    'X-api-key: 3ea3cd6ecf3f51540113b5f5d46c17a1956758adfaba13ba04056026bc60296b8271d508acd544d1041ad32a5cace62c816800cec0f95098fc4906efe2695ab9'
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

            if($post['status'] == 200){
            
                return [
                    'status'  => true,
                    'code'    => $post['status'],
                    'message' => $post['message']
                ];
            
            }

        } catch (Exception $ex) {

        }
    }


    public function validation(Request $request)
    {
        try {

            $input = $request->all();

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'http://test.sauverexchange.com/api/v2/transactions/validation/update',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array('id_transactions' => $input['id_transactions']),
                CURLOPT_HTTPHEADER => array(
                    'Accept: application/json',
                    'X-api-key: 3ea3cd6ecf3f51540113b5f5d46c17a1956758adfaba13ba04056026bc60296b8271d508acd544d1041ad32a5cace62c816800cec0f95098fc4906efe2695ab9'
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

            if($post['status'] == 200){
            
                return [
                    'status'  => true,
                    'code'    => $post['status'],
                    'message' => $post['message']
                ];
            
            }

        } catch (Exception $ex) {

        }
    }
    

}

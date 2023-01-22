<?php

/**
 *
 */
namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class HelperGetFunction
{
    public static function get_cURL($API_URL){

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $API_URL,
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
        $err = curl_error($curl);
        curl_close($curl);
        return json_decode($responses, true);
    }

    public static function post_cURL($API_URL, $url, $datas){

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $API_URL.$url,
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

        return json_decode($response, true);

    }

    /* public static function notifications($id_users){

        $notifies =  HelperGetFunction::get_function("v1/notify/get?id_users=".$id_users, "notifies");
        return $notifies;
    } */
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CurlController extends Controller
{
    //
    public static function getCurl($url, $params) {
        
        /*
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url . $params);        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

        $response = curl_exec($ch);
        curl_close($ch); 

        $obj = simplexml_load_string($response);
        */

        $obj = simpleXML_load_file($url.$params, "simpleXMLElement", LIBXML_NOCDATA);
        $obj = json_encode($obj);
        

        return $obj;
    }
}

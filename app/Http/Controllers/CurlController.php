<?php

namespace App\Http\Controllers;

use Goutte\Client;
use Illuminate\Http\Request;

class CurlController extends Controller
{
    //
    private $results = array();

    public static function getCurl($url, $params)
    {
        
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url . $params);        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, TRUE);;
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-type:application/json; charset=utf-8"));

        $response = curl_exec($ch);
        curl_close($ch); 

        return json_encode($response);

    }

    public static function getXml($url, $params) 
    {
        
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



    public static function scrapper()
    {
        /*
        $client = new Client();
        $url = 'https://m.safekorea.go.kr/idsiSFK/neo/ext/json/disasterDataList/disasterDataList.json';
        
        $page = $client->request('GET', $url);
        //echo "<pre>";
        //print_r($page);
        //echo "</pre>";

        print_r($page);
        */
        
        //echo $page->filter('#gen .has-map a')->text() . "=====";
        /*
        $page->filter('#gen .has-map')->each(function ($item){   
            echo "<pre>";         
            echo $item->filter('#gen .has-map')->text() . "+++" . print_r($item);
            //$item->filter('#gen')->each(function($do){
            //    echo $do->filter('.has-map')->text() . "+++" . print_r($do);
            //});
        });
        */
        
        
        $url = 'https://safekorea.go.kr/idsiSFK/neo/ext/json/disasterDataList/disasterDataList.json';
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-type:application/json; charset=utf-8"));

        $response = curl_exec($ch);
        curl_close($ch); 

        //$response = json_decode($response);

        echo "<pre>";
        print_r($response);

        echo "++++++";
        

        /*
        $url = 'https://safekorea.go.kr/idsiSFK/neo/ext/json/disasterDataList/disasterDataList.json';
        $obj = simpleXML_load_file($url, "simpleXMLElement", LIBXML_NOCDATA);
        $obj = json_decode($obj);

        print_r($obj);
        */

    }
}

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


    public function sendNoti()
    {
        $token = "e1IeuxQgwUo:APA91bFMhUglmW2MNU1Ui5DK5m4cWkDPzb1igfmZEncJH1UL3uae2UGd5wJ8BPTgOrcKvS7ftKF1O_JWHn4BvsH_cfKb0uDKUJoKRpt8LDIjFRBg5l0gjLbx-h3Cw30PShaA36XM4vXx";  
        $from = "AAAAV-0WwLk:APA91bF_luycW3zLbnAHNi5QESV6YPqRn9FhjNFuHE3O3RSC0jb20_1ddfEHKgCGOCeCNXST8xAcfDSJE7pnZuKpPcK-B9KcVKOdR9t4-G4R_MoUp_Cphgfq2gRKuglnbujgYsdY5L76";
        $msg = array
              (
                'body'  => "Testing Testing",
                'title' => "Hi, From Raj",
                'receiver' => 'erw',
                'icon'  => "https://image.flaticon.com/icons/png/512/270/270014.png",/*Default Icon*/
                'sound' => 'mySound'/*Default sound*/
              );

        $fields = array
                (
                    'to'        => $token,
                    'notification'  => $msg
                );

        $headers = array
                (
                    'Authorization: key=' . $from,
                    'Content-Type: application/json'
                );
        //#Send Reponse To FireBase Server 
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec($ch );
        dd($result);
        curl_close( $ch );
    }
}

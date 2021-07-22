<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FcmController extends Controller
{
    public function index()
    {
        return view('firebase');
    }

    public function sendNoti()
    {
        $token = "e1IeuxQgwUo:APA91bFMhUglmW2MNU1Ui5DK5m4cWkDPzb1igfmZEncJH1UL3uae2UGd5wJ8BPTgOrcKvS7ftKF1O_JWHn4BvsH_cfKb0uDKUJoKRpt8LDIjFRBg5l0gjLbx-h3Cw30PShaA36XM4vXx";  
        $from = "AAAAV-0WwLk:APA91bF_luycW3zLbnAHNi5QESV6YPqRn9FhjNFuHE3O3RSC0jb20_1ddfEHKgCGOCeCNXST8xAcfDSJE7pnZuKpPcK-B9KcVKOdR9t4-G4R_MoUp_Cphgfq2gRKuglnbujgYsdY5L76";
        $msg = array
              (
                'body'  => "Testing Testing",
                'title' => "Hi, From Rahel",
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

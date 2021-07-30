<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FcmController extends Controller
{
    public function index()
    {
        return view('firebase');
    }

    public function saveToken(Request $request)
    {

        $query = DB::table('tbl_user_token')            
            ->where('token', '=', $request->input('token'))
            ->get();
        $cnt = $query->count();
        

        if($cnt == 0){   
            $result = DB::table('tbl_user_token')->insert(
                [
                'token' => $request->input('token')
                ]                                      
            );
        }  
    }

    public function sendNoti()
    {

        $tokens = DB::table('tbl_user_token')->select('token')->get();

        
        $from = "AAAAV-0WwLk:APA91bF_luycW3zLbnAHNi5QESV6YPqRn9FhjNFuHE3O3RSC0jb20_1ddfEHKgCGOCeCNXST8xAcfDSJE7pnZuKpPcK-B9KcVKOdR9t4-G4R_MoUp_Cphgfq2gRKuglnbujgYsdY5L76";
        foreach($tokens as $key => $val):
            $token = $val->token;

            $msg = array
              (
                'body'  => "역천괴역천괴역천괴역천괴역천괴역천괴",
                'title' => "알림테스트 해보는즁",
                'receiver' => 'erw',
                'icon'  => "/assets/img/icon/coronavirus.png",
                'sound' => 'mySound'
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

        endforeach;

    }
}

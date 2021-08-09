<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail; 

class MailController extends Controller
{
    //
    public function sendEmail()
    {
        $details = [
            'title' => 'Mail from Laravel!!!!!',
            'body' => 'This is Test mail from laravel.'
        ];

        Mail::to("eogksusa@gmail.com")->send(new SendMail($details));
        return "Email send";

    }
}

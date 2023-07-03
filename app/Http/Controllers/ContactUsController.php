<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $message = $request->input('message');
        $subject = $request->input('subject');
        //Send a mail to admin
        try{
        // $to ="graceischool2017@gmail.com";
        $to = "asishantony@gmail.com";
        $subject = "Contact Us";
        $message = "You have received a new message from the Grace International School contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email\n\nSubject: $subject\n\nMessage:\n$message";
        $headers = "From:info@graceinternationalschoolknr.com";
        mail($to,$subject,$message,$headers);
        return response('Your messge is sent', 200)
                  ->header('Content-Type', "text/plain");

        }catch(Exception $e){
            return response('Your messge is not sent', 401)
                  ->header('Content-Type', "text/plain");
        }
    }
   
}

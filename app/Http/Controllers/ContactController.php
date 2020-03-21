<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
// use App\Mail\Request as Email;
use Illuminate\Mail\Markdown;

class ContactController extends Controller
{

    public function index()
    {
        return view('contact');
    }

    public function contact_admin()
    {
        // dd(request()->all());

        $data_v = request()->validate([
            'Email' => 'required|email',
            'Username' => 'required',
            'Message' => 'required',
            'Subject' => 'required'
        ]);

        // Mail::to('php1.store.test@gmail.com')->send(new ContactFormMail());

        $to_name = "Hello World";
        $to_email = 'php1.store.test@gmail.com';

        $data = array("name"=>request()->input('Username'), "body" => request()->input('Message'), "email" =>request()->input('Email'));

        Mail::send('emails.contact.contact-form', $data, function($message) use ($to_name, $to_email) {
            $message->from(request()->input('Email'), request()->input('Username'));
            $message->to($to_email, $to_name);
            $message->subject(\request()->input('Subject'));
            
        });

        // return $result;
    }
}

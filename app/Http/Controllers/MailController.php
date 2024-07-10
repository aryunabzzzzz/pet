<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send(string $email, string $name)
    {
        Mail::send('mail', ['name'=>$name], function ($message) use ($email, $name) {
            $message->to($email, $name)->subject('OrderCreated');
            $message->from('aryuPet@mail.ru', 'aryuna');
        });
        echo 'success';
    }
}

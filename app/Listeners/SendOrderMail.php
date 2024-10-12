<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use Illuminate\Support\Facades\Mail;

class SendOrderMail
{
    /**
     * Handle the event.
     */
    public function handle(OrderCreated $event): void
    {
        $name = $event->order->user->name;
        $email = $event->order->user->email;

        Mail::send('mail', ['name'=>$name], function ($message) use ($email, $name) {
            $message->to($email, $name)->subject('OrderCreated');
            $message->from('aryuPet@mail.ru', 'aryuna');
        });
    }
}

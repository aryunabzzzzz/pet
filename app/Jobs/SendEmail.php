<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{
    protected array $data;
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $name = $this->data['name'];
        $email = $this->data['email'];

        Mail::send('mail', ['name'=>$name], function ($message) use ($email, $name) {
            $message->to($email, $name)->subject('Queue work');
            $message->from('aryuPet@mail.ru', 'aryuna');
        });
    }
}

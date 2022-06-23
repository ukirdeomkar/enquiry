<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ClientMail extends Mailable
{
    use Queueable, SerializesModels;
    public $client;

    public function __construct($client){

        $this->client = $client;

    }

    public function build(){

        return $this->subject('This is Client Mail')
                    ->view('email.client');
    }

}

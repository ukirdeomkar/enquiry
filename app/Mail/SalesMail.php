<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SalesMail extends Mailable
{
    use Queueable, SerializesModels;
    public $sales;

    public function __construct($sales){

        $this->sales = $sales;

    }

    public function build(){

        return $this->subject('This is Sales Mail')
                    ->view('email.sales');
    }

}

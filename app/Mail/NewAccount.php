<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewAccount extends Mailable
{
    use Queueable, SerializesModels;

    
    public $userName;
    public $authCode;
    public function __construct($userName,$authCode)
    {
        $this->userName = $userName;
        $this->authCode = $authCode;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.newAccount')->with('userName',$this->userName,'authCode',$this->authCode);
    }
}

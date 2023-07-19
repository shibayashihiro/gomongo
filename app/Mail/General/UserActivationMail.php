<?php

namespace App\Mail\General;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserActivationMail extends Mailable
{

    private $emailData;

    public function __construct($emailData)
    {
        $this->emailData = $emailData;
    }


    public function build()
    {
        return $this->view('mail.General.user_activation_mail', [
            'data' => $this->emailData,
        ])->subject('Welcome to ' . site_name);
    }
}

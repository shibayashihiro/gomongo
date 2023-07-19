<?php

namespace App\Mail\General;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactEnquiryMail extends Mailable
{

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }


    public function build()
    {
        return $this->view('mail.General.contact_enquiry', [
            'data' => $this->data,
        ])->subject('Contact Enquiry');
    }
}

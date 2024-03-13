<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\App;

class NewDeviceMail extends  Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $mailData;
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mailData)
    {

        $this->mailData = $mailData;
        $this->data = $mailData;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->view("mail.new-device")
            ->from('noreply@monarchco.de')
            ->subject('Successful sign-in for '.$this->mailData['username'].' from new device on monarchco website')
            ->to($this->mailData['email']);
    }
}

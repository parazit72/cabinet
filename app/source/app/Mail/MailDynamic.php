<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailDynamic extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $email;
    public $template;
    public $subject;
    public $content;
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($content, $data)
    {
        $this->email = $content->email;
        $this->template = $content->template;
        $this->subject = $content->subject;
        $this->content = $content;
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->view("mail.$this->template")
            ->from('noreplysnatchdigital@gmail.com')
            ->subject($this->subject)
            ->to($this->email);
    }
}

<?php

namespace App\Mail\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendNotificationsMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email_data;
    public $template;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email_data, $template)
    {
        $this->email_data = $email_data;
        $this->template = $template;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email-template.'.$this->template);
    }
}

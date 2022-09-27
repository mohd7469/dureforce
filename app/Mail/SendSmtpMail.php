<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use App\Models\PasswordReset;
use Illuminate\Queue\SerializesModels;

class SendSmtpMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;

    public $template;
    public function __construct($data,$template)
    {

        $this->data = $data;
        $this->template = $template;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $token_data = PasswordReset::where('email',$this->template)->first();
        return $this->subject('Reset Password')
            ->view('register_email_template',["token_data" => $token_data->token]);
    }
}

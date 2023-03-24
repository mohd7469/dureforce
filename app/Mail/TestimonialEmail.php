<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\UserTestimonial;
use Illuminate\Support\Facades\Auth;

class TestimonialEmail extends Mailable

{
    use Queueable, SerializesModels;

    public UserTestimonial $user_testimonial;
    public $response_url;
    public $user;
    /*
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user_testimonial)
    {
        $this->user_testimonial = $user_testimonial;
        $this->user=Auth::user();
        $this->response_url =route('response.testimonial',['token' => $user_testimonial->token]);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->subject('Am requesting for testimonial')->view('layout_email\testimonial\testimonial');
    }
}

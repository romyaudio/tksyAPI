<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class verifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Verify Email Address";

    public $user;

    public $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;

        $this->url = 'http://'.$_SERVER["SERVER_NAME"].'/email/verify?id='.$user["id"].'&val='.$user["token"];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         $this->view('mails.VerifyEmail');

    }
}

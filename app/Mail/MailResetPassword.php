<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailResetPassword extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Reset Password";

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
        $this->url = 'http://'.$_SERVER["SERVER_NAME"].'/reset/password?id='.$user["id"].'&val='.$user["password_token"];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.resetPassword');
    }
}

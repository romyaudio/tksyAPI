<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailNewTeam extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'Team invitation';

    public $team;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($team)
    {
        $this->team = $team;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.newteam');
    }
}

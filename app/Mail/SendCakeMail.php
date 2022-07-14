<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendCakeMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $cakeMail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(\stdClass $cakeMail)
    {
        $this->cakeMail = $cakeMail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject($this->cakeMail->subject);
        $this->to($this->cakeMail->email);

        return $this->view('mail.sendCake', [
            'cake' => $this->cakeMail
        ]);
    }
}

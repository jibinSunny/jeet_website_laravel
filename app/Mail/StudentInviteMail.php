<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StudentInviteMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'lithin.km@iroidtechnologies.com';
        $subject = 'Invitation';
        $name   = 'Admin';
        return $this->view('admin.emails.sendInvitationUser')
            ->from($address, $name)
            ->subject($subject)
            ->with($this->data);
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUsMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $emailuser;
    protected $nameuser;
    protected $subjectuser;
    protected $messageuser;
    public function __construct($emailuser, $nameuser, $subjectuser, $messageuser)
    {
        $this->emailuser = $emailuser;
        $this->nameuser = $nameuser;
        $this->subjectuser = $subjectuser;
        $this->messageuser = $messageuser;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subjectuser)
                    ->view('emails.ContactUs')
                    ->with([
                        'emailuser' => $this->emailuser,
                        'nameuser' => $this->nameuser,
                        'subjectuser' => $this->subjectuser,
                        'messageuser' => $this->messageuser
                    ]);
    }
}

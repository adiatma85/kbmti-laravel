<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EventEmailResponser extends Mailable
{
    use Queueable, SerializesModels;

    // Event Object that want to be used
    private $eventEmail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($eventEmail)
    {
        $this->eventEmail = $eventEmail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'))
            ->subject('kbmti-no-replies')
            ->view('emails.event-email-template')
            ->with([
                'context' => $this->eventEmail->context,
                'respondent' => $this->eventEmail->respondent,
                'bodyText' => $this->eventEmail->bodyText,
                'link' => $this->eventEmail->link ?? '',
            ]);
    }
}

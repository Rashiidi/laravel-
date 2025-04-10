<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TrainerNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $subjectText;
    public $messageBody;

    public function __construct($subjectText, $messageBody)
    {
        $this->subjectText = $subjectText;
        $this->messageBody = $messageBody;
    }

    public function build()
    {
        return $this->subject($this->subjectText)
                    ->view('emails.trainer_notification')
                    ->with([
                        'messageBody' => $this->messageBody,
                    ]);
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


class SendMessageToEndUser extends Mailable
{
    use Queueable, SerializesModels;

    public $senderMessage  = '';
    public $name  = '';
    /**
     * Create a new message instance.
     */
    public function __construct( $name, $senderMessage )
    {
        $this->name = $name;
        $this->senderMessage = $senderMessage;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'INPES Receive Your Messages',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            // view: 'enduser-mail',
             markdown: 'pages.mail.reply_email',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}


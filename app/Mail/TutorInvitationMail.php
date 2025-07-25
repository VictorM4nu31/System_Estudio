<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TutorInvitationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $enlace;
    public $alumno;

    /**
     * Create a new message instance.
     */
    public function __construct($enlace, $alumno)
    {
        $this->enlace = $enlace;
        $this->alumno = $alumno;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Tutor Invitation Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.tutor.invitation',
        );
    }

    public function build()
    {
        return $this->subject('Invitación para ser tutor en el sistema educativo')
            ->markdown('emails.tutor.invitation')
            ->with([
                'enlace' => $this->enlace,
                'alumno' => $this->alumno,
            ]);
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

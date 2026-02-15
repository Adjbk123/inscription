<?php

namespace App\Mail;

use App\Models\Inscription;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InscriptionAccepteMail extends Mailable
{
    use Queueable, SerializesModels;

    public $inscription;

    /**
     * Create a new message instance.
     */
    public function __construct(Inscription $inscription)
    {
        $this->inscription = $inscription;
    }

    /**
     * Email subject
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Votre candidature a été acceptée - Maflyt Sarl',
        );
    }

    /**
     * Email content
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.inscription_acceptee',
            with: [
                'name' => $this->inscription->name,
            ],
        );
    }

    /**
     * Attachments
     */
    public function attachments(): array
    {
        return [];
    }
}

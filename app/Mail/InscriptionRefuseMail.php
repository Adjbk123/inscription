<?php

namespace App\Mail;

use App\Models\Inscription; // ✅ IMPORT IMPORTANT
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InscriptionRefuseMail extends Mailable
{
    use Queueable, SerializesModels;

    public $inscription;

    public function __construct(Inscription $inscription)
    {
        $this->inscription = $inscription;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Votre candidature - Maflyt Sarl',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.inscription_refusee',
            with: [
                'name' => $this->inscription->name,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}

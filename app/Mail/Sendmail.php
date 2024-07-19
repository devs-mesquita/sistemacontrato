<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;

use App\Models\Contrato;

class Sendmail extends Mailable
{
    use Queueable, SerializesModels;

    public $contrato;
    public $dias;

    /**
     * Create a new message instance.
     */
    public function __construct(Contrato $contrato, $dias)
    {
       $this->contrato = $contrato; 
       $this->dias = $dias; 
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('semad@mesquita.rj.gov.br', 'PREFEITURA MUNICIPAL DE MESQUITA'),
            subject: 'Alerta de Validade do Contrato',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.sendmail',
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

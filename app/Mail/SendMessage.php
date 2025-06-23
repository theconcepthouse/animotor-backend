<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendMessage extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public function __construct(public array $data){}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->data['title'] ?? 'Message from ' . get_site_name(),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.message',
            with: [
                'title' => $this->data['title'] ?? 'Message from ' . get_site_name(),
                'content' => $this->data['message'] ?? null,
                'user' => $this->data['user'] ?? null,
                'name' => $this->data['name'] ?? null,
            ]
        );
    }



    public function attachments(): array
    {
        return [];
    }
}

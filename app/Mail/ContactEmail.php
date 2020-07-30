<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    private $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $data)
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
        return $this
            ->replyTo($this->data['replay_email'], $this->data['replay_name'])
            ->to(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
            ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
            ->subject("Novo contato: " . $this->data['subject'])
            ->markdown('contact', [
                "replay_name" => $this->data['replay_name'],
                "replay_email" => $this->data['replay_email'],
                "subject" => $this->data['subject'],
                "message" => $this->data['message']
            ]);
    }
}

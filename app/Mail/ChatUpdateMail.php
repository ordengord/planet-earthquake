<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Chat;


class ChatUpdateMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $chat;

    /**
     * Create a new message instance.
     *
     * @param Chat $chat
     * @return void
     */
    public function __construct(Chat $chat)
    {
        $this->chat = $chat;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.chat-update', ['chat' => $this->chat]);
    }
}


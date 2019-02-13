<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\NewChatEvent;
use App\Mail\ChatUpdateMail;
use Illuminate\Support\Facades\Mail;

class NewChatNotifier
{
    // for test
    protected const EMAIL_RECEIVER = 'ordengord@gmail.com';

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewChatEvent $event
     * @return void
     */
    public function handle(NewChatEvent $event)
    {
        $chatMail = new chatUpdateMail($event->getChat());
        Mail::to(self::EMAIL_RECEIVER)->send($chatMail);
    }
}

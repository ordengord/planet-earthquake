<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use App\Events\NewChatEvent;
use App\Chat;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    /*public function get(Request $request)
    {
        return view('contact');
    }*/

    public function __invoke(Request $request, bool $msgSent = false)
    {
        if ($request->has('issue')) {
            $request->validate([
                'email' => 'nullable|email',
                'issue' => 'required|min:10|max:255'
            ]);

            $email = $request->email ?? Auth::user()->email;

            $chat = new Chat(['email' => $email,
                'issue' => $request->issue]);

            $chat->save();

            Event::fire(new NewChatEvent($chat));

            $msgSent = true;
        }

        return view('contact')->with(compact(['email', 'msgSent']));
    }

}

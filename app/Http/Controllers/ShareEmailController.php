<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Mail\SendEventMail;

class ShareEmailController extends Controller
{
    public function share(Event $event, Request $request)
    {
        // return new SendEventMail($event,$request->user);
        $user = User::findOrFail($request->user);
        Mail::to($user->email)
        ->cc(Auth::user()->email)
        ->send(new SendEventMail($event,$user));

        return to_route('event.show', $event)->with('success', 'Event shared via email');
    }
}

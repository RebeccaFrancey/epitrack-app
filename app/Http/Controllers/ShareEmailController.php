<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\Event;
use App\Models\User;
use App\Mail\SendEventMail;

class ShareEmailController extends Controller
{
    public function __invoke(Event $event, Request $request)
    {
        // return new SendEventMail($event,$request->user);
        $user = User::findOrFail($request->user);
        Mail::to($user->email)
        ->cc(Auth::user()->email)
        ->send(new SendEventMail($event,$user));

        return to_route('event.show', $event)->with('success', 'Event shared via email');
    }
}

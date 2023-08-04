<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Event;
use App\Models\DogProfile;


class EventsController extends Controller
{
    public function index()
    {
        $userId= Auth::id();
        $events= Event::where('user_id', $userId)
        ->latest('created_at')
        ->get();

        return view('events.index')->with('events', $events);
    }

    public function show(string $id)
    {
        $event = Event::where('id',$id)
        ->where('user_id', Auth::id())
        ->firstOrFail();

        return view('events.show')->with('event', $event);
    }

    public function create(Event $event): View
    {
        return view('events.create')->with('event', $event);
    }

    public function store(Request $request)
    {
        Auth::user()->events()->create([
            'category' => $request->category,
            'duration' => $request->duration,
            'awake_asleep' => $request->awake_asleep == 'on' ? 1 : 0,
            'severity' => $request->severity,
            'emergency_med' => $request->emergency_med == 'on' ? 1 : 0,
            'body' => $request->body == 'on' ? 1 : 0,
            'movement' => $request->movement == 'on' ? 1 : 0,
            'mouth' => $request->mouth == 'on' ? 1 : 0,
            'bladder' => $request->bladder == 'on' ? 1 : 0,
            'vomit' => $request->vomit == 'on' ? 1 : 0,
            'responsive' => $request->responsive == 'on' ? 1 : 0,
            'chewing' => $request->chewing == 'on' ? 1 : 0,
            'description' => $request->description,
            'image_filename'=>$request->image_filename,
        ]);
        return to_route('events.index');
    }

    public function edit(string $id)
    {
        $event = Event::where('id', $id)
        ->where('user_id', Auth::id())
        ->firstOrFail();

        return view('events.edit')->with('event', $event);
    }

    public function update(Request $request, Event $event)
    {
        if(!$event->user->is(Auth::user())){
            return abort(403);
        }

        $event->update([
            'category' => $request->category,
            'duration' => $request->duration,
            'awake_asleep' => $request->awake_asleep == 'on' ? 1 : 0,
            'severity' => $request->severity,
            'emergency_med' => $request->emergency_med == 'on' ? 1 : 0,
            'body' => $request->body == 'on' ? 1 : 0,
            'movement' => $request->movement == 'on' ? 1 : 0,
            'mouth' => $request->mouth == 'on' ? 1 : 0,
            'bladder' => $request->bladder == 'on' ? 1 : 0,
            'vomit' => $request->vomit == 'on' ? 1 : 0,
            'responsive' => $request->responsive == 'on' ? 1 : 0,
            'chewing' => $request->chewing == 'on' ? 1 : 0,
            'description' => $request->description,
        ]);
        return to_route('events.show', $event);
    }

    public function destroy(Event $event)
    {
        if(!$event->user->is(Auth::user())){
            return abort(403);
        }

        // $event->dogProfiles()->detach();
        $event->forceDelete();
        return to_route('events.index')->with('success', 'Deleted successfully');
    }

    public function timer(Event $event): View
    {
        return view('events.timer');
    }

    public function __invoke(Request $request)
    {
        $results = [];
        if ($query = $request->get('query'))
        {
            $results = DogProfile::search($query)->get();
        }
        return view('events.index', compact('results'));
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\EventSeizure;
use App\Models\EventType;

class EventSeizuresController extends Controller
{
    //display list of events
    public function index()
    {
        $userId= Auth::id();
        $eventSeizures= EventSeizure::where('user_id', $userId)
        ->latest('updated_at')
        ->get();

        return view('events.index')->with('eventSeizures', $eventSeizures);
    }

    public function show(string $id)
    {
        $eventSeizure = EventSeizure::where('id',$id)
        ->where('user_id', Auth::id())
        ->firstOrFail();

        return view('events.show')->with('eventSeizure', $eventSeizure);
    }

    //show form to create event
    public function create()
    {

    }
}

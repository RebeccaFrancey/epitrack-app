<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;
use App\Models\Event;
use App\Models\DogProfile;
use App\Models\User;
use App\Mail\SendEventMail;


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
        $users = User::all()->except(Auth::id()); //somehow add ->where('role' == 'vet')
        $event = Event::where('id',$id)
        ->where('user_id', Auth::id())
        ->firstOrFail();

        return view('events.show')->with('event', $event)->with('users', $users);
    }

    public function create(Event $event): View
    {
        return view('events.create')->with('event', $event);
    }

    public function store(Request $request)
    {
        // Auth::user()->events()->create([
        //     'category' => $request->category,
        //     'duration' => $request->duration,
        //     'awake_asleep' => $request->awake_asleep == 'on' ? 1 : 0,
        //     'severity' => $request->severity,
        //     'emergency_med' => $request->emergency_med == 'on' ? 1 : 0,
        //     'body' => $request->body == 'on' ? 1 : 0,
        //     'movement' => $request->movement == 'on' ? 1 : 0,
        //     'mouth' => $request->mouth == 'on' ? 1 : 0,
        //     'bladder' => $request->bladder == 'on' ? 1 : 0,
        //     'vomit' => $request->vomit == 'on' ? 1 : 0,
        //     'responsive' => $request->responsive == 'on' ? 1 : 0,
        //     'chewing' => $request->chewing == 'on' ? 1 : 0,
        //     'description' => $request->description,
        //     'image_filename'=>$request->image_filename == 'image|mimes:jpeg,png,jpg,svg|max:2048',
        // ]);
        $userId = Auth::id();
        $event = new Event;
        $event->user_id= Auth::id();
        $event->category=$request->input('category');
        $event->duration=$request->input('duration');
        $event->awake_asleep=$request->input('awake_asleep') == 'on' ? 1 : 0;
        $event->severity=$request->input('severity');
        $event->emergency_med=$request->input('emergency_med') == 'on' ? 1 : 0;
        $event->body=$request->input('body') == 'on' ? 1 : 0;
        $event->movement=$request->input('movement') == 'on' ? 1 : 0;
        $event->mouth=$request->input('mouth') == 'on' ? 1 : 0;
        $event->bladder=$request->input('bladder') == 'on' ? 1 : 0;
        $event->vomit=$request->input('vomit') == 'on' ? 1 : 0;
        $event->responsive=$request->input('responsive') == 'on' ? 1 : 0;
        $event->chewing=$request->input('chewing') == 'on' ? 1 : 0;
        $event->description=$request->input('description');
        if ($request->has('image_filename'))
        {
            $event->image_filename=$this->storeImage($request);
        }

        $event->save();
        return to_route('events.index');
    }

    private function storeImage(Request $request)
    {
        if($request->hasFile('image_filename'))
        {
            $dbName=$request->file('image_filename');

            $image= Image::make($dbName);
            $destinationPath= storage_path('app/public/uploads/');
            $image->save($destinationPath.time().$dbName->getClientOriginalName());

            return time().$dbName->getClientOriginalName();

        }
    }

    // private function storeImage(Request $request)
    // {
    //     if ($request->hasFile('image_path'))
    //     {
    //         $originalFileName = $request->file('image_path')->getClientOriginalName();
    //         $fileName = pathinfo($originalFileName, PATHINFO_FILENAME);
    //         $extension = $request->file('image_path')->getClientOriginalExtension();
    //         $requester = auth()->user()->email;
    //         $fileName = $requester.'_'.$fileName.'_'.time().'.'.$extension;

    //         $request->file('image_path')->storeAs('public/uploads', $fileName);
    //         $url = asset('storage/uploads/'.$fileName);

    //         return $url;
    //     }
    // }

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

        // $event->update([
        //     'category' => $request->category,
        //     'duration' => $request->duration,
        //     'awake_asleep' => $request->awake_asleep == 'on' ? 1 : 0,
        //     'severity' => $request->severity,
        //     'emergency_med' => $request->emergency_med == 'on' ? 1 : 0,
        //     'body' => $request->body == 'on' ? 1 : 0,
        //     'movement' => $request->movement == 'on' ? 1 : 0,
        //     'mouth' => $request->mouth == 'on' ? 1 : 0,
        //     'bladder' => $request->bladder == 'on' ? 1 : 0,
        //     'vomit' => $request->vomit == 'on' ? 1 : 0,
        //     'responsive' => $request->responsive == 'on' ? 1 : 0,
        //     'chewing' => $request->chewing == 'on' ? 1 : 0,
        //     'description' => $request->description,
        // ]);
        $event->category=$request->input('category');
        $event->duration=$request->input('duration');
        $event->awake_asleep=$request->input('awake_asleep') == 'on' ? 1 : 0;
        $event->severity=$request->input('severity');
        $event->emergency_med=$request->input('emergency_med') == 'on' ? 1 : 0;
        $event->body=$request->input('body') == 'on' ? 1 : 0;
        $event->movement=$request->input('movement') == 'on' ? 1 : 0;
        $event->mouth=$request->input('mouth') == 'on' ? 1 : 0;
        $event->bladder=$request->input('bladder') == 'on' ? 1 : 0;
        $event->vomit=$request->input('vomit') == 'on' ? 1 : 0;
        $event->responsive=$request->input('responsive') == 'on' ? 1 : 0;
        $event->chewing=$request->input('chewing') == 'on' ? 1 : 0;
        $event->description=$request->input('description');
        if ($request->has('image_filename'))
        {
            $event->image_filename=$this->storeImage($request);
        }

        $event->update();

        return to_route('events.show', $event);
    }

    public function destroy(Event $event)
    {
        if(!$event->user->is(Auth::user())){
            return abort(403);
        }

        $destinationPath = 'public/uploads/';
        $image = $destinationPath.$event->image_filename;
        if(Storage::exists($image))
        {
            Storage::delete($image);
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

    // public function share(Event $event, Request $request)
    // {
    //     // return new SendEventMail($event,$request->user);
    //     $user = User::findOrFail($request->user);
    //     Mail::to($user->emial)
    //     ->cc(Auth::user()->email)
    //     ->send(new SnedEventMail($event,$user));

    //     return to_route('event.show', $event)->with('success', 'Event shared via email');
    // }

}

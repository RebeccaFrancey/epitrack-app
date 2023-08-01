<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Event;
use App\Models\User;
use App\Models\DogProfile;

class DogProfilesController extends Controller
{
    public function show(string $id)
    {
        $dogProfile = DogProfile::where('id',$id)
        ->where('user_id', Auth::id())
        ->firstOrFail();

        return view('dogProfiles.show')->with('dogProfile', $dogProfile);
    }

    public function create(DogProfile $dogProfile): View
    {
        return view('dogProfiles.create')->with('dogProfile', $dogProfile);
    }

    public function generateNumber()
    {
        do{
            $number = random_int(100000, 999999);
        }while (DogProfile::where("number", "=", $number)->first());
        return $number;
    }

    public function store(Request $request)
    {
        Auth::user()->dogProfiles()->create([
            'name' => $request->name,
            'age' => $request->age,
            'sex' => $request->sex == 'on' ? 1 : 0,
            'weight' =>$request->weight,
            'breed' =>$request->breed,
            'epilepsy_type' =>$request->epilepsy_type,
            'medication' =>$request->medication,
            'reminder' =>$request->reminder == 'on' ? 1 : 0,
            'other' =>$request->other,
            'number' => $this->generateNumber()
        ]);
        return to_route('events.index');
        // $dogProfile = DogProfile::where('id',$id);
        // return to_route('dogProfiles.show')->with('dogProfile', $dogProfile);
    }

    public function edit(string $id)
    {
        $dogProfile = DogProfile::where('id', $id)
        ->where('user_id', Auth::id())
        ->firstOrFail();

        return view('dogProfiles.edit')->with('dogProfile', $dogProfile);
    }

    public function update(Request $request, DogProfile $dogProfile)
    {
        if(!$dogProfile->user->is(Auth::user())){
            return abort(403);
        }

        $dogProfile->update([
            'name' => $request->name,
            'age' => $request->age,
            'sex' => $request->sex == 'on' ? 1 : 0,
            'weight' =>$request->weight,
            'breed' =>$request->breed,
            'epilepsy_type' =>$request->epilepsy_type,
            'medication' =>$request->medication,
            'reminder' =>$request->reminder == 'on' ? 1 : 0,
            'other' =>$request->other,
        ]);
        return to_route('events.index');
    }

    public function destroy(DogProfile $dogProfile)
    {
        if(!$dogProfile->user->is(Auth::user())){
            return abort(403);
        }

        // $dogProfile->events()->detach();
        $dogProfile->forceDelete();
        return to_route('events.index')->with('success', 'Profile deleted successfully');
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

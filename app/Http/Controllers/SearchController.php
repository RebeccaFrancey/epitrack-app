<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\DogProfile;
use App\Models\Event;
use App\Models\User;

class SearchController extends Controller
{
    // public function __invoke(Request $request)
    // {
    //     $results = [];
    //     if ($query = $request->get('query'))
    //     {
    //         $results = DogProfile::search($query)->get();
    //     }
    //     return view('search.output', compact('results'));
    // }
    // public function __invoke(Request $request)
    // {
    //     $results = [];
    //     if ($query = $request->get('query'))
    //     {
    //         $results = Event::search($query)->get();
    //     }
    //     return view('search.output', compact('results'));
    // }

    public function __invoke(Request $request)
    {
        $users = User::all();
        $results = [];
        if ($query = $request->get('query'))
        {
            if ($userID = $request->get('user_id'))
            {
                $results = Event::search($query)->where('user_id', $userID)->paginate(5);
            }
            else
            {
                $results = Event::search($query)->paginate(5);
            }
        }
        return view('search.output', compact('results', 'users'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\DogProfile;
use App\Models\Event;

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
    public function __invoke(Request $request)
    {
        $results = [];
        if ($query = $request->get('query'))
        {
            $results = Event::search($query)->get();
        }
        return view('search.output', compact('results'));
    }
}

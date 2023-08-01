<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Event;
use App\Models\Type;

use Illuminate\Http\Request;

class TypesController extends Controller
{
    public function index() {
        $types = Type::orderBy("type", "asc")->with('events')->get();

        return view('types.index', compact('types'));
    }
}

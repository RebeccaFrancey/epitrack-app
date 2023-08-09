<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Event;
use PDF;

class PdfController extends Controller
{
    public function index(string $id)
    {
        $event = Event::where('id', $id);
        $pdf = PDF::loadView('pdf.sample', [
            'title' => 'EpiTrack - Epileptic Event Log',
            'category' => $event->category,
            'severity' =>$event->severity,
        ]);
        return $pdf->download('sample.pdf');
    }
}

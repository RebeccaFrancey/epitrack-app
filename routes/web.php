<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DogProfilesController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\TimerController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ShareEmailController;
use App\Http\Controllers\PdfController;
use App\Http\Mail\SendEventMail;
use Barryvdh\Dubugbar\Facades\Debugbar;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/email', function () {
    return new SendEventMail();
});
Route::post('share/{event}', [ShareEmailController::class, '__invoke'])->name('share');
// Route::post('/events', [EventsController::class, 'share'])->name('events.share');

// Route::get('/search', SearchController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/media', MediaController::class);
    Route::resource('/events', EventsController::class);
    Route::resource('/timer', TimerController::class);
    Route::resource('/dogProfiles', DogProfilesController::class);
    Route::get('share/{event}', [ShareEmailController::class, '__invoke'])->name('share');
    Route::get('/search', [SearchController::class, '__invoke']);
    Route::get('/event/pdf', [EventsController::class, 'createPDF']);
    Route::get('pdf', [PdfController::class, 'index']);
    Route::get('/events/{id}/pdf', [EventsController::class, 'showPdf'])->name('events.showPdf');
    // Route::post('share/{$event}', ShareEmailController::class)->name('share');
    // Route::post('/events', [EventsController::class, 'share'])->name('events.share');
    // Route::post('/events', [EventsController::class, 'store'])->name('events.store'); //can't have 2 post requests to same url!

});

require __DIR__.'/auth.php';

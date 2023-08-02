<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DogProfilesController;
use App\Http\Controllers\EventsController;
use App\Http\Contorllers\MediaController;
// use App\Http\Cpntrollers\SearchController;
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

// Route::get('/search', SearchController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/media', MediaController::class);
    Route::resource('/events', EventsController::class);
    Route::resource('/types', TypesController::class);
    Route::resource('/dogProfiles', DogProfilesController::class);
});

require __DIR__.'/auth.php';

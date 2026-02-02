<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\EventController;
use App\Models\Event;

Route::get('/', function () {

    $events = Event::where('date', '>=', now()->toDateString())
                   ->orderBy('date', 'asc')
                   ->orderBy('start_time', 'asc')
                   ->get();
    return view('index', ['events' => $events]);
});

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'show']);
Route::post('/register', [RegisterController::class, 'store']);

// Admin only routes
Route::middleware('admin')->group(function () {
    Route::get('/create', [EventController::class, 'create']);
    Route::post('/events', [EventController::class, 'store']);
    Route::get('/events/{event}/edit', [EventController::class, 'edit']);
    Route::put('/events/{event}', [EventController::class, 'update']);
    Route::delete('/events/{event}', [EventController::class, 'destroy']);
});

Route::get('/event/{event}', [EventController::class, 'show']);


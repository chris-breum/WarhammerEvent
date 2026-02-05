<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\EventController;
use App\Models\Event;

Route::get('/', function () {
    $sortBy = request('sort', 'date');
    $order = request('order', 'asc');

    $query = Event::where('date', '>=', now()->toDateString());

    switch ($sortBy) {
        case 'title':
            $query->orderBy('title', $order);
            break;
        case 'category':
            $query->orderBy('category', $order)->orderBy('date', 'asc');
            break;
        case 'date':
        default:
            $query->orderBy('date', $order)->orderBy('start_time', $order);
            break;
    }

    $events = $query->get();
    return view('index', ['events' => $events, 'sortBy' => $sortBy, 'order' => $order]);
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
    
    // User management
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index']);
    Route::patch('/users/{user}/role', [App\Http\Controllers\UserController::class, 'updateRole']);
});

Route::get('/event/{event}', [EventController::class, 'show']);


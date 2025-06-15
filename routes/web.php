<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController; // 👈 Add this for login route

// Home page (you can redirect to login or welcome)
Route::get('/', function () {
    return view('welcome'); // Or use: return redirect('/login');
});

// Authentication routes
Auth::routes();

// ✅ Apply rate limiter to login route (3 attempts/minute)
Route::post('/login', [LoginController::class, 'login'])
    ->middleware(['throttle:login'])
    ->name('login');

// Protected routes (only for authenticated users)
Route::middleware(['auth'])->group(function () {
    Route::resource('todos', TodoController::class);

    // ✅ Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/delete', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Optional: redirect after login
Route::get('/home', function () {
    return redirect('/todos');
});

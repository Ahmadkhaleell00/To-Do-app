<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', function () {
    return view('welcome'); // or redirect('/login') if you want
});

// Authentication routes
Auth::routes();

// Protected routes (for authenticated users)
Route::middleware(['auth'])->group(function () {
    Route::resource('todos', TodoController::class);
});

// Optional: redirect after login/register
Route::get('/home', function () {
    return redirect('/todos');
});

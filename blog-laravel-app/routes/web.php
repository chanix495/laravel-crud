<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BlogsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard & Authenticated Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Blog CRUD Routes (Ensuring Authentication)
    Route::resource('blogs', BlogsController::class)->middleware('auth');
});

// Authentication Routes
require __DIR__.'/auth.php';

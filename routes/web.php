<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GoogleController;

use App\Http\Controllers\JitsiController;


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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// routes/web.php
Route::get('/drsteve', [ProfileController::class, 'showsteve'])->name('profile.show');
//use App\Http\Controllers\ProfileController;

Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');


Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.auth');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');

// Example route to send a message
Route::get('send-message', [GoogleController::class, 'sendMessageToChat'])->name('google.send.message');



// routes/web.php


Route::middleware(['auth'])->group(function () {
    Route::get('/jitsi', [JitsiController::class, 'index'])->name('jitsi.index');
    Route::get('/jitsi/room/{roomName}', [JitsiController::class, 'room'])->name('jitsi.room');
});


require __DIR__.'/auth.php';

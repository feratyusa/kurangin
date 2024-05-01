<?php

use App\Http\Controllers\LinkController;
use App\Http\Controllers\ProfileController;
use App\Models\Link;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('links', LinkController::class)
    ->only(['store']);

Route::get('/links/{short}', [LinkController::class, 'show'])->name('links.show');

Route::get('/b/{short}', [LinkController::class, 'besarin'])->name('links.besarin');

require __DIR__.'/auth.php';

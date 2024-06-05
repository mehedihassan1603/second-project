<?php

use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/', [MessageController::class, 'Errors'])->name('errors');
    Route::get('/add-error', [MessageController::class, 'AddError'])->name('add-errors');
    Route::post('/post-error', [MessageController::class, 'PostError'])->name('post-errors');
    Route::get('/error/edit/{id}', [MessageController::class, 'ErrorEdit'])->name('error_edit');
    Route::get('/delete/{id}', [MessageController::class, 'destroy'])->name('error_destroy');
    Route::post('/update-error', [MessageController::class, 'UpdateError'])->name('update-error');
});

require __DIR__.'/auth.php';

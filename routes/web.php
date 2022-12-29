<?php

use App\Http\Controllers\Api\ApiBooksController;
use App\Http\Controllers\BookHistoryRecordsController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', BooksController::class . '@index')->middleware(['auth', 'verified'])->name('dashboard');
Route::post('/books/markAsTaken/{book}', BookHistoryRecordsController::class . '@markAsTaken')->middleware(['auth'])->name('markAsTaken');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

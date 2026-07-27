<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

require __DIR__.'/auth.php';

use App\Http\Controllers\ProductController;

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);

// VULNERABLE: no auth middleware - missing authentication
Route::get('/api/users', function() {
    return response()->json(\DB::select("SELECT id, name, email FROM users"));
});

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileShowController;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileShowController::class, 'show']);
    Route::get('/admin/users', [AdminController::class, 'users']);
});

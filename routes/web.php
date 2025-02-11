<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;

Route::get('/', function () {
    return view('home');
});

Route::get('admin.users', [AdminController::class, 'getTotalUser'], function () {
    return view('admin/index');
})->middleware(['auth', 'verified'])->name('admin.users');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/admin/users', [AdminController::class, 'getTotalUser'])->name('admin.users.index');
});

require __DIR__.'/auth.php';

<?php

use App\Http\Middleware\AuthAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Models\User;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');


Route::middleware(['auth', AuthAdmin::class])->group( function ()
{ 
    Route::get('/admin', [UserController::class, 'index'])->name('admin');
    Route::get('/admin_users', [UserController::class, 'users'])->name('users_boards');
    Route::get('/admin_users/{id}', [UserController::class, 'showUsers'])->name('users_boards_show');
});

require __DIR__.'/auth.php';

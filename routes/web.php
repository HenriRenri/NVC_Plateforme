<?php

use App\Http\Middleware\AuthAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    Route::get('/admin_users/{id}', [UserController::class, 'show'])->name('users_boards_show');
    Route::get('/admin_users_add', [UserController::class, 'create'])->name('users_boards_add');
    Route::post('/admin_users_add', [UserController::class, 'store'])->name('users_boards_store');
});

require __DIR__.'/auth.php';

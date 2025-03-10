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
    Route::get('/admin_users/{id}', [UserController::class, 'show'])->name('users_show');
    Route::get('/admin_users_add', [UserController::class, 'create'])->name('users_add');
    Route::post('/admin_users_add', [UserController::class, 'store'])->name('users_store');
    Route::get('/admin_users_edit/{id}', [UserController::class, 'edit'])->name('users_edit');
    Route::put('/admin_users_edit/{id}', [UserController::class, 'update'])->name('users_update');
    Route::delete('/admin_users_delete/{user}', [UserController::class, 'deleted'])->name('delete');
});

require __DIR__.'/auth.php';

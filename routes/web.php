<?php

use App\Http\Middleware\AuthAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BoxesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoriesController;

Route::get('/', function () { return view('home'); })->name('home');
Route::get('/logout', function () { Auth::logout(); return redirect('/'); })->name('logout');


Route::middleware(['auth', AuthAdmin::class])->group( function ()
{ 
    //Index Admin
    Route::get('/admin', [UserController::class, 'index'])->name('admin');

    // Users routes
    Route::get('/admin_users', [UserController::class, 'users'])->name('users_boards');
    Route::get('/admin_users/{id}', [UserController::class, 'show'])->name('users_show');
    Route::post('/admin_users_add', [UserController::class, 'store'])->name('users_store');
    Route::get('/admin_users_edit/{id}', [UserController::class, 'edit'])->name('users_edit');
    Route::put('/admin_users_edit/{id}', [UserController::class, 'update'])->name('users_update');
    Route::delete('/admin_users_delete/{id}', [UserController::class, 'delete'])->name('users_delete');

    // Categories routes
    Route::get('/admin_categories', [CategoriesController::class, 'index'])->name('category');
    Route::get('/admin_categories/{id}', [CategoriesController::class, 'show'])->name('categories_show');
    Route::post('/admin_categories_add', [CategoriesController::class, 'store'])->name('categories_store');
    Route::get('/admin_categories_edit/{id}', [CategoriesController::class, 'edit'])->name('categories_edit');
    Route::put('/admin_categories_edit/{id}', [CategoriesController::class, 'update'])->name('categories_update');
    Route::delete('/admin_categories_delete/{id}', [CategoriesController::class, 'delete'])->name('categories_delete');

    //Boxes routes
    Route::get('/admin_boxes', [BoxesController::class, 'index'])->name('boxes');

    // Products routes
    Route::get('/admin_products', [ProductsController::class, 'index'])->name('products');
    Route::get('/admin_products/{id}', [ProductsController::class, 'show'])->name('products_show');
    Route::get('/admin_products_create', [ProductsController::class, 'create'])->name('products_create');
    Route::post('/admin_products_add', [ProductsController::class, 'store'])->name('products_store');
});

require __DIR__.'/auth.php';

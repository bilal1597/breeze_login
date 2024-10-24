<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/products', [UserController::class, 'showProducts'])->name('product.view');

    Route::get('/add/products', [UserController::class, 'loadAddUser'])->name('viewAdd.product');
    Route::post('/add/products', [UserController::class, 'addUser'])->name('post.product');


    Route::get('/edit/{id}', [UserController::class, 'viewProduct'])->name('view.product');
    Route::put('/edit/products', [UserController::class, 'editProduct'])->name('edit.product');


    Route::delete('/delete/{id}', [UserController::class, 'deleteProduct'])->name('delete.product');

    ///////////// Profile /////////////////

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

//////////// PRODUCTS /////////////////////////

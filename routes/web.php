<?php

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/user', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/user/list', [UserController::class, 'index'])->name('user.index');
    Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog.index');
    Route::get('/add-catalog', [CatalogController::class, 'create'])->name('catalog.create');
    Route::post('/add-catalog', [CatalogController::class, 'store'])->name('catalog.store');
    Route::get('/edit-catalog/{catalog}', [CatalogController::class, 'edit'])->name('catalog.edit');

    // admin user routes
    Route::get('/add-user', [UserController::class, 'create'])->name('user.create');
    Route::post('/add-user', [UserController::class, 'store'])->name('user.store');
    Route::get('/edit-user/{user}', [UserController::class, 'edit'])->name('user.edit');
});

require __DIR__.'/auth.php';

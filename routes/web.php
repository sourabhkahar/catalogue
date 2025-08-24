<?php

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
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

    // tags
    Route::get('/tag', [TagController::class, 'index'])->name('tag.index');
    Route::get('/add-tag', [TagController::class, 'create'])->name('tag.create');
    Route::post('/add-tag', [TagController::class, 'store'])->name('tag.store');
    Route::get('/edit-tag/{tag}', [TagController::class, 'edit'])->name('tag.edit');

    // products
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/add-product', [ProductController::class, 'create'])->name('product.create');
    Route::post('/add-product', [ProductController::class, 'store'])->name('product.store');
    Route::get('/edit-product/{product}', [ProductController::class, 'edit'])->name('product.edit');
});

require __DIR__.'/auth.php';

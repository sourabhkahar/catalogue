<?php

use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\ProfileController;
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
    Route::get('/catalog', [CatalogueController::class, 'index'])->name('catalog.index');
    Route::get('/add-catalog', [CatalogueController::class, 'create'])->name('catalog.create');
});

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\NovelController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect('/novels');
});

Route::get('/novels', [NovelController::class, 'index'])->name('novels.index');
Route::get('/novels/create', [NovelController::class, 'create'])->name('novels.create');
Route::post('/novels', [NovelController::class, 'store'])->name('novels.store');
Route::get('/novels/{novel}/edit', [NovelController::class, 'edit'])->name('novels.edit');
Route::put('/novels/{novel}', [NovelController::class, 'update'])->name('novels.update');
Route::delete('/novels/{novel}', [NovelController::class, 'destroy'])->name('novels.destroy');
Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index');
Route::get('/authors/create', [AuthorController::class, 'create'])->name('authors.create');
Route::post('/authors', [AuthorController::class, 'store'])->name('authors.store');
Route::get('/authors/{author}', [AuthorController::class, 'show'])->name('authors.show');
Route::get('/authors/{author}/edit', [AuthorController::class, 'edit'])->name('authors.edit');
Route::put('/authors/{author}', [AuthorController::class, 'update'])->name('authors.update');
Route::delete('/authors/{author}', [AuthorController::class, 'destroy'])->name('authors.destroy');
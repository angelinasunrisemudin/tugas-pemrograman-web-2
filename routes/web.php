<?php

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
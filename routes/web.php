<?php

use App\Http\Controllers\NovelController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/novels');
});

Route::resource('novels', NovelController::class);
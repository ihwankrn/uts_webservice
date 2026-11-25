<?php

use App\Http\Controllers\BiodataController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BiodataController::class, 'index'])->name('home');
Route::resource('biodatas', BiodataController::class)->except(['show']);
<?php

use App\Http\Controllers\IndexController;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ListingController;

// Route::get('/php', function () {
//     return view('php')->name('php');
// });


Route::get('/', [IndexController::class, 'index']);
Route::get('/show', [IndexController::class, 'show']);

Route::resource('listing', ListingController::class)->only(['index', 'show']);

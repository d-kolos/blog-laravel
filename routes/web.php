<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\SiteController as SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'index']);

Route::resource('posts', PostController::class);

Route::get('/welcome-laravel', function () {
    return view('welcome-laravel-breeze');
});

require __DIR__.'/auth.php';

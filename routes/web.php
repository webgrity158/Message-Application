<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AuthController::class)->prefix('auth')->as('auth.')->group(function () {
    Route::get('/login', 'Login')->name('login');
});

Route::controller(HomeController::class)->prefix('home')->as('home.')->group(function () {
    Route::get('/', 'Index')->name('index');
});

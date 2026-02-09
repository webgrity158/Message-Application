<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

Route::controller(AuthController::class)->prefix('auth')->as('auth.')->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authenticate')->name('authenticate');
    Route::post('/register', 'register')->name('register');
});

Route::controller(HomeController::class)->prefix('home')->as('home.')->group(function () {
    Route::post('/', 'initData')->name('initData');
    Route::post('/inbox', 'inboxData')->name('inboxData');

});

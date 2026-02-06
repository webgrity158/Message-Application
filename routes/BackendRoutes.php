<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

Route::controller(AuthController::class)->prefix('auth')->as('auth.')->group(function () {
    Route::get('/login', 'Login')->name('login');
});

Route::controller(HomeController::class)->prefix('home')->as('home.')->group(function () {
    Route::post('/', 'initData')->name('initData');
    Route::post('/inbox', 'inboxData')->name('inboxData');

});
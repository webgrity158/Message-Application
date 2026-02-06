<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RotesController;

Route::controller(RotesController::class)->group(function () {
    Route::get('/home', 'home')->name('home');
});
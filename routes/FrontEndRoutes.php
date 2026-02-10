<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RotesController;
use App\Http\Middleware\CheckLogin;

Route::get('/auth', function() {
    return view('auth.auth');
})->name('auth');

Route::group(['middleware' => CheckLogin::class], function() {
    Route::get('/home', function() {
        return view('socket.home');
    })->name('home');
});

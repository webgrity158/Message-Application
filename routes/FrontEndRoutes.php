<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RotesController;


Route::get('/auth', function() {
    return view('auth.auth');
})->name('auth');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', function() {
        return view('socket.home');
    })->name('home');
});

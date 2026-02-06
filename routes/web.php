<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect(route('front-end.home'));
});
Route::as('front-end.')->group(base_path('routes/FrontEndRoutes.php'));
Route::as('back-end.')->group(base_path('routes/BackendRoutes.php'));

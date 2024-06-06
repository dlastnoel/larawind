<?php

;
use App\Http\Controllers\Web\AuthenticationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\HomeController;


Route::get('/', [HomeController::class,'index'])
    ->name('home.index');

Route::controller(AuthenticationController::class)->group(function () {

    Route::get('/login', 'create')
        ->name('auth.create');

    Route::post('/login', 'store')
        ->name('auth.store');

    Route::delete('/logout', 'destroy')
        ->middleware('auth')
        ->name('auth.destroy');
});
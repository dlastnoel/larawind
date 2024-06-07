<?php

;
use App\Http\Controllers\Web\AuthenticationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\UserController;


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

Route::controller(UserController::class)->group(function () {

    Route::get('/users', 'index')
        ->name('users.index');
        
    Route::get('/users/create', 'create')
        ->name('users.create');

    Route::post('/users', 'store')
        ->name('users.store');

    Route::get('/users/{user}/edit', 'edit')
        ->name('users.edit');

    Route::put('/users/{user}', 'update')
        ->name('users.update');
});
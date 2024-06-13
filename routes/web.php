<?php

;
use App\Http\Controllers\Web\AuthenticationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\UserController;
use App\Http\Controllers\Web\UserStatusController;
use App\Http\Controllers\Web\UserProfileController;
use App\Http\Controllers\Web\UserPasswordController;


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

Route::middleware('auth')->group(function () {
    
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
    
    Route::put('/users/{user}/status', [UserStatusController::class, 'update'])
        ->name('users-status.update');

    Route::controller(UserProfileController::class)->group(function() {

        Route::get('/user-profile', 'edit')
            ->name('user-profile.edit');

        Route::post('/user-profile', 'update')
            ->name('user-profile.update');
    });

    Route::post('/user-password', [UserPasswordController::class, 'update'])
        ->name('user-password.update');

});

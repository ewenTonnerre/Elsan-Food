<?php

use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AuthController::class, 'create'])
                ->name('login');

    Route::post('/admin/login', [AuthController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('/admin/logout', [AuthController::class, 'destroy'])
                ->name('logout');
});

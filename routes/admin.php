<?php

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'create'])->name('login');
    Route::post('/login', [AuthController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');
    Route::get('/', function () { return view('admin/admin');})->name('admin');
    Route::get('/categories', [CategoryController::class, 'getCategories'])->name('categories');
    Route::get('/categories/add', [CategoryController::class, 'create'])->name('addCategory');
    Route::post('/categories/add', [CategoryController::class, 'store'])->name('createCategory');
});

require __DIR__.'/auth.php';

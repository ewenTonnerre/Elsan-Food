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

    Route::controller(CategoryController::class)->group(function () {
        Route::get('/categories', 'getCategories')->name('categories');
        Route::get('/categories/add','create')->name('addCategory');
        Route::post('/categories/add', 'store')->name('createCategory');
        Route::get('/categories/{category}', ('edit'))->name('editCategory');
        Route::post('/categories/{category}', ('update'))->name('updateCategory');
        Route::get('/categories/{categoryId}/delete', ('delete'))->name('deleteCategory');
    });
});

require __DIR__.'/auth.php';

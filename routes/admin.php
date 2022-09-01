<?php

use App\Http\Controllers\Admin\DishesController;
use App\Http\Controllers\Admin\RestaurantsController;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoriesController;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'create'])->name('login');
    Route::post('/login', [AuthController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');
    Route::get('/', function () { return view('admin/admin');})->name('admin');

    Route::controller(CategoriesController::class)->group(function () {
        Route::get('/categories', 'getCategories')->name('categories');
        Route::get('/categories/add','create')->name('addCategory');
        Route::post('/categories/add', 'store')->name('createCategory');
        Route::get('/categories/{category}', 'edit')->name('editCategory');
        Route::post('/categories/{category}', 'update')->name('updateCategory');
        Route::get('/categories/{categoryId}/delete', 'delete')->name('deleteCategory');
    });

    Route::controller(RestaurantsController::class)->group(function() {
        Route::get('/restaurants', 'getRestaurants')->name('restaurants');
        Route::get('/restaurants/add','create')->name('addRestaurant');
        Route::post('/restaurants/add', 'store')->name('createRestaurant');
        Route::get('/restaurants/{restaurant}', 'edit')->name('editRestaurant');
        Route::post('/restaurants/{restaurant}', 'update')->name('updateRestaurant');
        Route::get('/restaurants/{restaurantId}/delete', 'delete')->name('deleteRestaurant');
    });

    Route::controller(DishesController::class)->group(function() {
        Route::get('/restaurants/{restaurantId}/dishes', 'getDishes')->name('dishes');
        Route::get('/restaurants/{restaurantId}/dishes/add','create')->name('addDish');
        Route::post('/restaurants/{restaurantId}/dishes/add', 'store')->name('createDish');
        Route::get('/restaurants/{restaurantId}/dishes/{dishId}', 'edit')->name('editDish');
        Route::post('/restaurants/{restaurantId}/dishes/{dishId}', 'update')->name('updateDish');
        Route::get('/restaurants/{restaurantId}/dishes/{dishId}/delete', 'delete')->name('deleteDish');
    });
});

require __DIR__.'/auth.php';

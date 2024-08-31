<?php

use App\Models\Shift;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MenuController;

//* LOGIN ROUTES 
Route::middleware('guest')->group(function () {
    Route::view('/', 'Login')->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.verify');
});



//* AUTH ROUTES
Route::middleware('admin')->group(function () {
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');


    //* SHOW DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'dashbaord'])->name('dashboard');

    //* SHIFTS 
    Route::controller(ShiftController::class)->prefix('shift/')->name('shift.')->group(function () {
        Route::get('index/{id?}', 'index')->name('index');
        Route::post('store-update/{id?}', 'storeOrUpdate')->name('storeOrUpdate');
        Route::get('delete/{id}', 'delete')->name('delete');
    });


    //* EMPLOYEE MANAGEMENT
    Route::controller(EmployeeController::class)->prefix('employee/')->name('employee.')->group(function () {
        Route::get('/all', 'allEmployees')->name('all');
        Route::get('/{id?}', 'addOrEdit')->name('addOrEdit');
        Route::POST('/store-update{id?}', 'storeOrUpdate')->name('storeOrUpdate');
    });


    //* DINE MANAGEMENT
    Route::prefix('dine/')->name('dine.')->group(function () {

        //*  DINE PERIOD
        Route::get('/add/{id?}', [TypeController::class, 'addOrStore'])->name('type.addOrEdit');
        Route::post('/store-update/{id?}', [TypeController::class, 'addOrUpdate'])->name('type.addOrUpdate');
        Route::get('/dine-delete/{id?}', [TypeController::class, 'delete'])->name('type.delete');

        //* FOOD MANAGEMENT
        Route::controller(FoodController::class)->prefix('food/')->name('food.')->group(function () {
            Route::get('/{id?}',  'addOrStore')->name('addOrEdit');
            Route::post('/store-update/{id?}',  'addOrUpdate')->name('addOrUpdate');
            Route::get('/dine-delete/{id?}',  'delete')->name('delete');
        });
        //* FOOD MANAGEMENT
        Route::controller(MenuController::class)->prefix('menu/')->name('menu.')->group(function () {
            Route::get('/',  'all')->name('all');
            Route::get('/add{id?}',  'addOrStore')->name('addOrEdit');
            Route::get('/add-items',  'addItems')->name('addOrEdit');
            Route::post('/store-update/{id?}',  'addOrUpdate')->name('addOrUpdate');
            Route::get('/dine-delete/{id?}',  'delete')->name('delete');
        });
    });
});

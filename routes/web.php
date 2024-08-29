<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ShiftController;
use App\Models\Shift;
use Illuminate\Support\Facades\Route;


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
});

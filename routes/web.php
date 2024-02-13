<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductMnagementController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductContoller;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\TopingsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('frontend.layouts.app');
});

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductContoller::class);
    Route::resource('coupons', CouponController::class);
    Route::resource('topings', TopingsController::class);
});


Auth::routes();


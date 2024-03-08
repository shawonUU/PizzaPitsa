<?php

use App\Models\Admin\DelivaryCharge;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\ProductContoller;
use App\Http\Controllers\Admin\TopingsController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\NutritionController;
use App\Http\Controllers\Admin\DelivaryChargeController;
use App\Http\Controllers\Admin\Location;
use App\Http\Controllers\Admin\ProductMnagementController;
use App\Http\Controllers\Admin\TimeScheduleController;
use App\Http\Controllers\OrderController;

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
    Route::resource('sizes', SizeController::class);
    Route::resource('nutritions', NutritionController::class);
    Route::resource('coupons', CouponController::class);
    Route::get('product-sizes/{id}', [ProductContoller::class, 'size'])->name('product_size');
    Route::delete('delete-product-sizes/{id}', [ProductContoller::class, 'deleteProductSize'])->name('productSize.destroy');

    Route::post('store-product-sizes', [ProductContoller::class, 'storeSize'])->name('product_size.store');
    Route::get('create-product-sizes/{id}', [ProductContoller::class, 'createProductSize'])->name('product_size.create');
    Route::get('edit-product-sizes/{id}', [ProductContoller::class, 'editProductSize'])->name('product_size.edit');
    //topings assign
    Route::get('store-product-topings/{id}', [ProductContoller::class, 'topings'])->name('product_topting');
    Route::post('store-product-topings', [ProductContoller::class, 'storeToping'])->name('product_toping.store');
    Route::patch('updatel-product-sizes/{id}', [ProductContoller::class, 'updateSize'])->name('product_size.update');
    Route::resource('topings', TopingsController::class);
    Route::resource('delivery_charges', DelivaryChargeController::class);
    Route::resource('currency', CurrencyController::class);
    Route::resource('schedule', TimeScheduleController::class);
    Route::resource('location', Location::class);

    //Order Management
    Route::get('orders', [OrderController::class, 'getOrders'])->name('orders.index');
    Route::post('order-update', [OrderController::class, 'updateQty'])->name('orders.update');
    Route::get('order-details/{id}', [OrderController::class, 'getOrderDetails'])->name('order.details');
    Route::post('update-status',[OrderController::class, 'updateStatus'])->name('update.status');
    Route::post('update-address',[OrderController::class, 'updateAddress'])->name('address.update');
    Route::get('get-order-info',[OrderController::class, 'getCustomerOrderInfo']);
});

Route::post('palce-order', [OrderController::class, 'placeOrder']);
Route::prefix('frontend')->middleware(['auth'])->group(function () {
    Route::post('update-customer-data',   [CustomerController::class, 'updateCustomerData']);
});


Auth::routes();


//Api for axios

Route::get('get-categories', [CategoryController::class, 'getCategories'])->name('get.categories');
Route::get('get-products', [ProductContoller::class, 'getProducts'])->name('get.products');
Route::get('get-product-details', [ProductContoller::class, 'getProductDetails']);
Route::get('check-coupon', [CouponController::class, 'checkCoupon']);
Route::get('get-currency', [CurrencyController::class, 'getCurrency'])->name('get.currency');
Route::post('customer-signUp', [CustomerController::class, 'customerSignUp']);
Route::post('customer-signIn', [CustomerController::class, 'customerLogin']);
Route::post('send-verification-mail', [CustomerController::class, 'sendVerificationMail']);
Route::post('verify-account', [CustomerController::class, 'verifyAccount']);
Route::get('get-my-orders', [OrderController::class, 'getCustomerProduct']);
Route::get('get-order-status', [OrderController::class, 'getOrderStatus']);

Route::get('/{any}', function () {
    return view('frontend.layouts.app');
})->where('any', '.*');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrmCustomerController;

Route::get('/laravel', [CustomerController::class, 'index'])->name('index');

Route::get('/add', [CustomerController::class, 'addCustomer'])->name('add');
Route::post('/add', [CustomerController::class, 'postCustomer'])->name('addCus');

Route::get('/update/{id}', [CustomerController::class, 'updateCustomer'])->name('updateCus');
Route::post('/update/{id}', [CustomerController::class, 'postUpdateCus'])->name('postUpdateCus');

Route::get('/del/{id}', [CustomerController::class, 'deleteCustomer'])->name('delete');
Route::get('/welcome', function () {
    return view('welcome');
});

//Route Customer
Route::prefix('customer')->group(function () {
    Route::match(['get', 'post'], 'login', [OrmCustomerController::class, 'login'])->name('customer.login');
        Route::middleware('checkLogin')->group(function () {
        Route::get('/', [OrmCustomerController::class, 'index'])->name('customer.index');
        Route::get('/order', [OrmCustomerController::class, 'getOrder'])->name('customer.order');
        Route::match(['get', 'post'], '/add', [OrmCustomerController::class, 'inserCustomer'])->name('customer.add');
        Route::get('/del/{id}', [OrmCustomerController::class, 'deleteCustomer'])->name('customer.delete');
        Route::get('/address/{id}', [OrmCustomerController::class, 'getAddress'])->name('customer.address');
        Route::match(['get', 'post'], 'update/{id}', [OrmCustomerController::class, 'updateCustomer'])->name('customer.update');
        Route::match(['get', 'post'], 'addAdr/{id}', [OrmCustomerController::class, 'addAddress'])->name('customer.addAdr');
        Route::get('/logout', [OrmCustomerController::class, 'logout'])->name('customer.logout');
    });
});

//Route Product
Route::prefix('product')->group(function () {
    Route::get('/', [OrmCustomerController::class, 'getProduct'])->name('product.list');
});

//Route Order
Route::prefix('order')->group(function () {
    Route::get('/', [OrmCustomerController::class, 'getOrder'])->name('order.list');
});

//Router Comment
Route::prefix('comment')->group(function () {
    Route::get('/', [OrmCustomerController::class, 'getCmt'])->name('comment.list');
    Route::get('/post', [OrmCustomerController::class, 'getPost'])->name('comment.post');
});



//Vue Js
Route::get('/{any}', function () {
    return view('vue');
})->where("any", '.*');

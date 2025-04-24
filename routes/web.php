<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/customer/view', [CustomerController::class, 'index'])->name('customer.view');
Route::get('/customer/add/view', [CustomerController::class, 'addCustomerView'])->name('add.customer.view');
Route::post('/customer/store', [CustomerController::class, 'store'])->name('customer.store');
Route::delete('/customer/destroy/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');

Route::get('/products/view', [ProductController::class, 'index'])->name('products.view');

<?php

use App\Http\Controllers\ActivationController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/customer/view', [CustomerController::class, 'index'])->name('customer.view');
Route::get('/customer/add/view', [CustomerController::class, 'addCustomerView'])->name('add.customer.view');
Route::post('/customer/store', [CustomerController::class, 'store'])->name('customer.store');
Route::delete('/customer/destroy/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');

Route::get('/pacakge/view', [PackageController::class, 'index'])->name('package.view');
Route::post('/package/store', [PackageController::class, 'store'])->name('package.store');

Route::get('/customer/activation', [ActivationController::class, 'index'])->name('customer.activation');
Route::post('/customer/activation/store', [ActivationController::class, 'store'])->name('customer.activation.store');

Route::get('/invoice/view', [InvoiceController::class, 'index'])->name('invoice.view');

Route::get('/customer/transactions', [TransactionsController::class, 'index'])->name('customer.transactions');

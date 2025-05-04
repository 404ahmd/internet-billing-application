<?php

use App\Http\Controllers\ActivationController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionsController;
use App\Models\Customer;
use Illuminate\Database\Events\TransactionCommitted;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

//CUSTOMER =======================
Route::get('/customer/view', [CustomerController::class, 'index'])->name('customer.view');
Route::get('/customer/add/view', [CustomerController::class, 'addCustomerView'])->name('add.customer.view');
Route::post('/customer/store', [CustomerController::class, 'store'])->name('customer.store');
Route::get('/customer/search', [CustomerController::class, 'search'])->name('customer.search');
Route::delete('/customer/{id}/destroy', [CustomerController::class, 'destroy'])->name('customer.destroy');
Route::get('/customer/{customer}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
Route::put('/customer/{customer}/update', [CustomerController::class, 'update'])->name('customer.update');

//PACKAGE =======================
Route::get('/pacakge/view', [PackageController::class, 'index'])->name('package.view');
Route::post('/package/store', [PackageController::class, 'store'])->name('package.store');
Route::get('/package/{id}/edit', [PackageController::class, 'edit'])->name('package.edit');
Route::put('/package/{id}/update', [PackageController::class, 'update'])->name('package.update');
Route::delete('/package/{id}/destroy', [PackageController::class, 'destroy'])->name('package.destroy');

//ACTIVATION =======================
Route::get('/customer/activation', [ActivationController::class, 'index'])->name('customer.activation');
Route::post('/customer/activation/store', [ActivationController::class, 'store'])->name('customer.activation.store');

//INVOICE =======================
Route::get('/invoice/view', [InvoiceController::class, 'index'])->name('invoice.view');
Route::get('/invoices/{invoice}/edit', [InvoiceController::class, 'edit'])->name('invoices.edit');
Route::put('/invoices/{invoice}', [InvoiceController::class, 'update'])->name('invoices.update');
Route::get('/invoices/search', [InvoiceController::class, 'search'])->name('invoices.search');

//TRANSACTION =======================
Route::get('/transaction/view', [TransactionsController::class, 'index'])->name('transaction.view');
Route::get('/transaction/search', [TransactionsController::class, 'search'])->name('transaction.search');

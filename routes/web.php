<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', static function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', static function () {
    return view('home');
})->name('home')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('companies', [CompanyController::class, 'index'])->name('companies.index');
    Route::get('company-show/{company}', [CompanyController::class, 'show'])->name('company.show');
    Route::get('company-update', [CompanyController::class, 'update'])->name('company.update.form');
    Route::put('company-update', [CompanyController::class, 'update'])->name('company.update');
    Route::get('company-create', [CompanyController::class, 'store'])->name('company.create.form');
    Route::post('company-create', [CompanyController::class, 'store'])->name('company.create');
    Route::delete('company-destroy', [CompanyController::class, 'destroy'])->name('company.destroy');

    Route::get('customers', [CustomerController::class, 'index'])->name('customers.index');
    Route::get('customer-show/{customer}', [CustomerController::class, 'show'])->name('customer.show');
    Route::get('customer-update', [CustomerController::class, 'update'])->name('customer.update.form');
    Route::put('customer-update', [CustomerController::class, 'update'])->name('customer.update');
    Route::get('customer-create', [CustomerController::class, 'store'])->name('customer.create.form');
    Route::post('customer-create', [CustomerController::class, 'store'])->name('customer.create');
    Route::delete('customer-destroy', [CustomerController::class, 'destroy'])->name('customer.destroy');
});


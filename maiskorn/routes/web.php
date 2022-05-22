<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

// redirects user if not logged in
Route::group(['middleware' => ['auth']], function() {
    Route::resource('/products', App\Http\Controllers\ProductController::class);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



    // POS 
    // Route::get('/pos', [App\Http\Controllers\POSController::class, 'index'])->name('pos');
    // Route::post('checkout', [App\Http\Controllers\POSController::class, 'index'])->name('checkout');

});

Route::controller(App\Http\Controllers\POSController::class)->group(function () {
    Route::get('/pos', 'index')->name('pos');
    Route::post('/orders', 'store');
});

    // Route::post('checkout',[App\Http\Controllers\POSController::class, 'store'])->name('store');
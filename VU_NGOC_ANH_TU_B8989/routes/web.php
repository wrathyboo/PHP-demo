<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
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

Route::get('/index',[HomeController::class, 'index' ], function () {
})->name('home');

Route::get('/admin-dash', [AdminController::class, 'auth' ], function () {
})->name('admin.index');

Route::get('/admin-dash/products', [ProductController::class, 'list' ], function () {
})->name('product.list');

Route::get('/admin-dash/products/create', function () {
    $_Auth = Auth::user();
    return view('admin.products-add',compact('_Auth'));
})->name('product.add');
Route::get('/admin-dash/products/{id}', [ProductController::class, 'update_page' ], function () {
})->name('product.update');
Route::POST('/admin-dash/products/{id}', [ProductController::class, 'update' ], function () {
});
Route::DELETE('/admin-dash/products/{id}',[ProductController::class, 'destroy' ], function () {
})->name('product.destroy');
Route::POST('/admin-dash/products/create', [ProductController::class, 'create' ], function () {
});

Route::get('/', function () {
    return view('authorize.login');
})->name('login');

Route::get('/register', function () {
    return view('authorize.register');
})->name('register');

Route::post('login', [AccountController::class, 'login' ], function () {
});

Route::post('register', [AccountController::class, 'register' ], function () {
});
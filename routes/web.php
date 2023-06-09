<?php

use App\Http\Controllers\LoginController;
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
    return view('welcome');
});

Route::get('login', [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout']);
Route::post('login', [LoginController::class, 'actionLogin'])->name('login.action');


// route ini mengijinkan admin dan user mengakses
Route::middleware(['role:admin,user'])->group(function () {
    Route::get('/dashboard', function () {
        return view('welcome');
    });
});

// route ini hanya admin yang di ijinkan
Route::middleware(['role:admin'])->group(function () {
    Route::get('/products', function () {
        return view('welcome');
    });
});

// route ini hanya user yang di ijinkan
Route::middleware(['role:user'])->group(function () {
    Route::get('/carts', function () {
        return view('welcome');
    });
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use Illuminate\Contracts\Session\Session;

use Illuminate\Http\Request;

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

Route::get('/login', function () {
    return view('login');
});

Route::get('/logout', function (Request $request) {
    $request->session()->forget('user');
    return view('login');
});

Route::view('/register', 'register');

Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);
Route::get('/', [ProductController::class, 'index']);
Route::get('details/{id}', [ProductController::class, 'show']);
Route::get('/search', [ProductController::class, 'search']);
Route::post('/add_to_cart', [ProductController::class, 'addToCart']);

Route::get('/cartlist', [ProductController::class, 'cartlist']);
Route::get('/removecart/{id}', [ProductController::class, 'removeCart']);
Route::get('ordernow', [ProductController::class, 'ordernow']);
Route::post('/orderplace', [ProductController::class, 'orderPlace']);
Route::get('/myorders', [ProductController::class, 'myOrders']);

Route::get('/exportexcel', [UserController::class, 'exportIntoExcel']);
Route::get('/exportcsv', [UserController::class, 'exportIntoCSV']);
Route::get('/dash', [UserController::class, 'dash']);

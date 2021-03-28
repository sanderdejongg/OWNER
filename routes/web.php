<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
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
Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::group(['prefix'    => 'products'], function (){
    Route::get('/',  [ProductController::class, 'index'])->name('products');
    Route::put('/new',  [ProductController::class, 'store'])->name('new');
    Route::delete('/delete',  [ProductController::class, 'delete'])->name('delete');
});

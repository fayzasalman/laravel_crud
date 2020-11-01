<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryFormController;
use App\Http\Controllers\CategoryCRUDController;
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

Route::get('category-form', [CategoryFormController::class, 'index']);
Route::post('store-form', [CategoryFormController::class, 'store']);

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware'=>"auth"], function (){
 Route::resource('category', CategoryCRUDController::class);
});

// Route::view('category.create', CategoryCRUDController::class)->;
<?php

use App\Http\Controllers\CategoryController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('product')->group(function (){
    Route::get('/',[ProductController::class,'showProducts'])->name('product.index');
    Route::get('/create',[ProductController::class,'create'])->name('product.create');
    Route::post('/create',[ProductController::class,'store'])->name('product.store');
});
Route::prefix('category')->group(function (){
    Route::get('/',[CategoryController::class, 'index'])->name('category.index');
    Route::get('/create',[CategoryController::class, 'create'])->name('category.create');
    Route::post('/create',[CategoryController::class, 'store'])->name('category.store');
    Route::get('{id}/delete',[CategoryController::class, 'delete'])->name('category.delete');
    Route::get('{id}/update',[CategoryController::class, 'edit'])->name('category.edit');
    Route::post('{id}/update',[CategoryController::class, 'update'])->name('category.update');
});

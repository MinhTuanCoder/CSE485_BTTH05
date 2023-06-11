<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Route::get('/',[HomeController::class,'getAllArticles']);
Route::get('admin/category', [CategoryController::class,'index'])->name('category.index');
Route::get('admin/category/add', [CategoryController::class,'edit'])->name('category.add');
Route::get('admin/category/{id}/edit', [CategoryController::class,'edit'])->name('category.edit');
Route::get('admin/category/{id}/delete', [CategoryController::class,'destroy'])->name('category.delete');
Route::get('admin/category/{id}/update', [CategoryController::class,'update'])->name('category.update');
Route::get('admin/category/store', [CategoryController::class,'store'])->name('category.store');

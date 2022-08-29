<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminProductController;


use App\Http\Controllers\Front\HomeController;



/***************************************************************************************************************************** */
/***************************************************************************************************************************** */


/* Admin Home */

Route::get('/admin/home',[AdminHomeController::class,'index'])->name('admin_home');

/* Admin Category */

Route::get('/admin/category/show',[AdminCategoryController::class,'show'])->name('admin_category_show');
Route::get('/admin/category/create',[AdminCategoryController::class,'create'])->name('admin_category_create');
Route::post('/admin/category/store',[AdminCategoryController::class,'store'])->name('admin_category_store');
Route::get('/admin/category/edit/{id}',[AdminCategoryController::class,'edit'])->name('admin_category_edit');
Route::post('/admin/category/update/{id}',[AdminCategoryController::class,'update'])->name('admin_category_update');
Route::get('/admin/category/delete/{id}',[AdminCategoryController::class,'delete'])->name('admin_category_delete');
Route::get('/admin/category/single_category/{id}',[AdminCategoryController::class,'single_category'])->name('admin_single_category');



/* Admin Product */

Route::get('/admin/product/show',[AdminProductController::class,'show'])->name('admin_product_show');
Route::get('/admin/product/create',[AdminProductController::class,'create'])->name('admin_product_create');
Route::post('/admin/product/store',[AdminProductController::class,'store'])->name('admin_product_store');
Route::get('/admin/product/edit/{id}',[AdminProductController::class,'edit'])->name('admin_product_edit');
Route::post('/admin/product/update/{id}',[AdminProductController::class,'update'])->name('admin_product_update');
Route::get('/admin/product/delete/{id}',[AdminProductController::class,'delete'])->name('admin_product_delete');
Route::get('/admin/product/single_product/{id}',[AdminProductController::class,'single_product'])->name('admin_single_product');



/***************************************************************************************************************************** */
/***************************************************************************************************************************** */



/* Home */


Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/all_products_categorywise/{id}',[HomeController::class,'all_products_categorywise'])->name('all_products_categorywise');
Route::get('/single_product/{id}',[HomeController::class,'single_product'])->name('single_product');
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserGroupController;
use App\Http\Controllers\UserSalesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\UserPaymentsController;
use App\Http\Controllers\UserPurchaseController;
use App\Http\Controllers\UserReceiptsController;



Route::get('/', function () {
    return view('login.form');
});
// LogIn
Route::get('login',[LoginController::class,'login'])->name('login');
Route::post('login',[LoginController::class,'confirm'])->name('login.confirm');

//Group route
Route::get('groups',[UserGroupController::class,'index'])->name('groups');
Route::get('groups/create',[UserGroupController::class,'create']);
Route::post('groups',[UserGroupController::class,'store']);
Route::delete('groups/{id}',[UserGroupController::class,'destroy']);

//user Route
Route::resource('users',UserController::class);
Route::get('users/{id}/sales',[UserSalesController::class,'index'])->name('user.sales');
Route::get('users/{id}/purchases',[UserPurchaseController::class,'index'])->name('user.purchases');
Route::get('users/{id}/payments',[ UserPaymentsController::class,'index'])->name('user.payments');
Route::post('users/{id}/payments',[ UserPaymentsController::class,'store'])->name('user.payments.store');
Route::delete('users/{id}/payments/{payment_id}',[ UserPaymentsController::class,'destroy'])->name('user.payments.destroy');
Route::get('users/{id}/receipts',[UserReceiptsController::class,'index'])->name('user.receipts');


//Category Route
Route::resource('categories',CategoriesController::class);

//Product Route
Route::resource('products',ProductsController::class);

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserGroupController;
use App\Http\Controllers\CategoriesController;



Route::get('/', function () {
    return view('welcome');
});
//Group route
Route::get('groups',[UserGroupController::class,'index'])->name('groups');
Route::get('groups/create',[UserGroupController::class,'create']);
Route::post('groups',[UserGroupController::class,'store']);
Route::delete('groups/{id}',[UserGroupController::class,'destroy']);
//user Route
Route::resource('users',UserController::class);
Route::resource('categories',CategoriesController::class);

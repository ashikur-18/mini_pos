<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserGroupController;
use App\Http\Controllers\UserSalesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DayReportsController;
use App\Http\Controllers\UserPaymentsController;
use App\Http\Controllers\UserPurchaseController;
use App\Http\Controllers\UserReceiptsController;
use App\Http\Controllers\PaymentReportController;
use App\Http\Controllers\ProductsStockController;
use App\Http\Controllers\ReceiptReportController;
use App\Http\Controllers\PurchaseReportController;
use App\Http\Controllers\Reports\SlaesReportController;


// LogIn
Route::get('login',[LoginController::class,'login'])->name('login');
Route::post('login',[LoginController::class,'confirm'])->name('login.confirm');


Route::group(['middleware' => 'auth'], function() {
	
	Route::get('dashboard', function () {
	    return view('dashboard');
	});

//logout
Route::get('logout',[LoginController::class,'logout'])->name('logout');

Route::get('/',[DashboardController::class,'index']);
Route::get('dashboard',[DashboardController::class,'index']);

//Group route
Route::get('groups',[UserGroupController::class,'index'])->name('groups');
Route::get('groups/create',[UserGroupController::class,'create']);
Route::post('groups',[UserGroupController::class,'store']);
Route::delete('groups/{id}',[UserGroupController::class,'destroy']);

//User Route
Route::resource('users',UserController::class);

Route::get('users/{id}/sales',[UserSalesController::class,'index'])->name('user.sales');

Route::post('users/{id}/invoices',[UserSalesController::class,'createInvoice'])->name('user.sales.store');
Route::get('users/{id}/invoices/{invoice_id}',[UserSalesController::class,'invoice'])->name('user.sales.invoice_details');
Route::delete('users/{id}/invoices/{invoice_id}',[UserSalesController::class,'destroy'])->name('user.sales.destroy'); 			
Route::post('users/{id}/invoices/{invoice_id}',[UserSalesController::class,'addItem'])->name('user.sales.invoices.add_item');
Route::delete('users/{id}/invoices/{invoice_id}/{item_id}',[UserSalesController::class,'destroyItem'])->name('user.sales.invoices.delete_item');

Route::get('users/{id}/reports',[ReportsController::class,'reports'])->name('user.reports');

//Purchase route
Route::get('users/{id}/purchases',[UserPurchaseController::class,'index'])->name('user.purchases');

Route::post('users/{id}/purchases',[UserPurchaseController::class,'createInvoice'])->name('user.purchases.store');
Route::get('users/{id}/purchases/{invoice_id}',[UserPurchaseController::class,'invoice'])->name('user.purchases.invoice_details');
Route::delete('users/{id}/purchases/{invoice_id}',[UserPurchaseController::class,'destroy'])->name('user.purchases.destroy'); 			
Route::post('users/{id}/purchases/{invoice_id}',[UserPurchaseController::class,'addItem'])->name('user.purchases.add_item');
Route::delete('users/{id}/purchases/{invoice_id}/{item_id}',[UserPurchaseController::class,'destroyItem'])->name('user.purchases.delete_item');

//Payment route
Route::get('users/{id}/payments',[ UserPaymentsController::class,'index'])->name('user.payments');
Route::post('users/{id}/payments/{invoice_id?}',[ UserPaymentsController::class,'store'])->name('user.payments.store');
Route::delete('users/{id}/payments/{payment_id}',[ UserPaymentsController::class,'destroy'])->name('user.payments.destroy');

// Receipt route
Route::get('users/{id}/receipts',[UserReceiptsController::class,'index'])->name('user.receipts');
Route::post('users/{id}/receipts/{invoice_id?}',[UserReceiptsController::class,'store'])->name('user.receipts.store');
Route::delete('users/{id}/receipts/{receipt_id}',[UserReceiptsController::class,'destroy'])->name('user.receipts.destroy');


//Category Route
Route::resource('categories',CategoriesController::class);

//Product Route
Route::resource('products',ProductsController::class);
Route::get('stocks',[ProductsStockController::class,'index'])->name('stocks');
Route::get('reports/sales',[SlaesReportController::class,'index'])->name('reports.sales');
Route::get('reports/purchases',[PurchaseReportController::class,'index'])->name('reports.purchases');
Route::get('reports/payments',[PaymentReportController::class,'index'])->name('reports.payments');
Route::get('reports/receipts',[ReceiptReportController::class,'index'])->name('reports.receipts');
Route::get('reports/days',[DayReportsController::class,'index'])->name('reports.days');
});
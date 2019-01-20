<?php

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

Route::post("invoice","InvoiceController@getInvoice");
Route::get("invoice","InvoiceController@createInvoice");

Route::get("invoice/pay/{price?}","InvoiceController@pay");
Route::get("invoice/success/","InvoiceController@payCurrentInvoice");

<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\User;

/*Customer*/
Route::get('/catalog', function () {
    return view('customer/catalog');
});
Route::get('/cart', function () {
    return view('customer/cart');
});
Route::get('/productreview', function () {
    return view('customer/review');
});
Route::get('/writereview', function () {
    return view('customer/writereview');
});
Route::get('/transaction', function () {
    return view('customer/transaction');
});
/*Product Manager*/
/*
Route::get('/viewAllProducts', function () {
    return view('product_manager/view_all_products');
});
Route::get('/editProduct', function () {
    return view('product_manager/edit_product');
});
*/
Route::get('/products', 'ProductController@viewAll');
Route::get('/products/{product}', 'ProductController@showOne');

/*Accounting Manager*/
Route::get('/sales', function () {
    return view('accounting_manager/sales');
});

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

/*Landing*/
Route::get('/', function () {
    return view('customer/catalog');
});
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
Route::group(['prefix' => 'products'], function () {
    Route::get('', 'ProductController@viewAll')->name('viewAllProducts');
    Route::get('/{product}', 'ProductController@showOne')->name('viewProduct');
    Route::patch('/{product}/update', 'ProductController@updateProduct')->name('updateProduct');
    Route::delete('/{product}/delete', 'ProductController@deleteProduct')->name('deleteProduct');

});
/*Where forms are submitted*/
Route::post('/productNew','ProductController@addNewProduct')->name('addNewProduct');


/*Accounting Manager*/
Route::get('/sales', function () {
    return view('accounting_manager/sales');
});

Route::auth();

Route::get('/home', 'HomeController@index');

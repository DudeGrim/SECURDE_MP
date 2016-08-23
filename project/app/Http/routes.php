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

Route::get('', 'CustomerController@showCatalog')->name('showCatalog');

/*Customer*/
Route::group(['prefix' => 'customer'], function(){
  Route::get('/cart', 'CustomerController@checkout')->name('checkoutCart');
  Route::get('/transaction', 'CustomerController@viewTransaction')->name('showTransactions');
  Route::get('/writereview/{product}', 'CustomerController@writeReview')->name('writeReviews');
});
/*Where forms are submitted*/
Route::post('/reviewNew','CustomerController@addNewReview')->name('reviewNew');

/*Product Manager*/
Route::group(['prefix' => 'products'], function () {
    Route::get('', 'ProductController@viewAll')->name('viewAllProducts');
    Route::get('/{product}', 'ProductController@showOne')->name('viewProduct');
    Route::patch('/{product}/update', 'ProductController@updateProduct')->name('updateProduct');
    Route::delete('/{product}/delete', 'ProductController@deleteProduct')->name('deleteProduct');

});
/*Where forms are submitted*/
Route::post('/productNew','ProductController@addNewProduct')->name('addNewProduct');


/*Accounting Manager*/
Route::get('/sales', 'TransactionController@viewAll')->name('viewAllTransactions');

/*
*/
/*Admin Manager*/
Route::get('/admin', function () {
    return view('admin_manager/admin_landing');
});
Route::post('/newAdmin', 'AdminController@createNewAdmin')->name('addNewAdmin');


Route::auth();

Route::get('/home', 'HomeController@index');

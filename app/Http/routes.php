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

Route::get('/', 'AdminController@get_home');
Route::controller('auth', 'AuthController');
Route::group(['middleware' => 'auth'], function () {

    Route::controller('product', 'ProductController');
    Route::controller('discount', 'DiscountController');
    Route::controller('ajax', 'AjaxController');
    Route::controller('settings', 'SettingsController');
    Route::controller('category', 'CategoryController');
    Route::controller('customer', 'CustomerController');
    Route::controller('brand', 'BrandController');
    Route::controller('stock', 'StockController');
    Route::controller('user', 'UserController');
    Route::controller('sell', 'SellController');
    Route::controller('purchase', 'PurchaseController');
    Route::controller('refund', 'RefundController');
});

/**
 * Custom Route
 */
Route::get('sells-history', 'SellController@history');
Route::get('purchase-history', 'PurchaseController@history');

get('pass', function () {
    return bcrypt('112233');
});

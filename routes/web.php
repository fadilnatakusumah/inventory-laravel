<?php

use App\Product;

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

Route::get('/',  [
    'uses' => 'HomeController@index',
    'as' => 'home.admin'
    ]
);

Auth::routes();

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function(){
    
    Route::get('/home', [
        'uses' => 'HomeController@index',
        'as' => 'home.view'
        ]
    );

    // Products
    Route::get('/products', [
        'uses' => 'ProductController@index',
        'as' => 'products.view'
        ]
    );
    Route::get('/add-products', [
        'uses' => 'ProductController@addProductView',
        'as' => 'add.products.view'
        ]
    );
    
    
    Route::get('/edit-product/{id}', [
        'uses' => 'ProductController@editProductView',
        'as' => 'edit.product.view'
        ]
    );

});
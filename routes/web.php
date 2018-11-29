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

Route::get('/',  
    // [
    // 'uses' => 'HomeController@index',
    // 'as' => 'home.admin'
    // ]
    function(){
        return view('welcome');
    }
);
Route::get('/admin',  
    function(){
        return redirect()->route('home.view');
    }
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
    
    Route::get('/deleting-products/{id}', [
        'uses' => 'ProductController@deletingProduct',
        'as' => 'deleting.products'
        ]
    );
    
    Route::post('/adding-product', [
        'uses' => 'ProductController@addingProduct',
        'as' => 'adding.product'
        ]
    );
    
    Route::get('/edit-product/{id}', [
        'uses' => 'ProductController@editProductView',
        'as' => 'edit.product.view'
        ]
    );

    Route::post('/editing-product/', [
        'uses' => 'ProductController@editingProduct',
        'as' => 'editing.product'
        ]
    );

    // Category Product
    Route::get('/category-products', [
        'uses' => 'CategoryProductController@index',
        'as' => 'categoryProducts.view'
        ]
    );

    // add new category
    Route::post('/adding-category-product', [
        'uses' => 'CategoryProductController@addingCategory',
        'as' => 'adding.categoryProduct'
        ]
    );

    // edit category view
    Route::get('/edit-category-product/{id}', [
        'as' => 'edit.categoryProduct.view',
        'uses' => 'CategoryProductController@editCategoryView'
    ]);

    // save edit category
    Route::post('/editing-category-product/', [
        'as' => 'editing.categoryProduct',
        'uses' => 'CategoryProductController@editingCategory'
    ]);

    Route::get('/deleting-category-product/{id}', [
        'as'=>'deleting.categoryProduct',
        'uses' => 'CategoryProductController@deletingCategoryProduct'
    ]);

   

});
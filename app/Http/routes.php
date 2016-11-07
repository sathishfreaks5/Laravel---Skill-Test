<?php

Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'ProductsController@create');
    Route::resource('products', 'ProductsController');
    Route::get('/products/{products}/delete', ['as' => 'products.delete', 'uses' => 'ProductsController@delete']);
});

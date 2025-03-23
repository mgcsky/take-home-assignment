<?php

use Illuminate\Support\Facades\Route;

Route::namespace('Product')->name('products.')->group(function () {
    Route::get('/products', 'ProductController@index')->name('index');
    Route::get('/products/count', 'ProductController@count')->name('count');
});

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


Route::group([
    'prefix' => 'admin',
        // 'middleware' => ['auth','theme:admin'],
    ], function () {
        Route::get('/', 'DashboardController@index')->middleware('checkLogin');
        Route::get('/product', 'ProductController@index')->middleware(['checkLogin', 'can:'.config('permissions.access.list-product')]);
        Route::get('/product/add', 'ProductController@create')->middleware(['checkLogin', 'can:'.config('permissions.access.create-product')]);
        Route::get('/product/edit/{id}', 'ProductController@edit')->middleware('checkLogin');
        Route::get('/product/edit/item/{id}', 'ProductController@getItemEdit')->middleware('checkLogin');
        Route::get('/product/images/list/{id}', 'ProductController@listImageById')->middleware('checkLogin');
        Route::get('/users', 'UserController@index')->middleware(['checkLogin', 'can:'.config('permissions.access.list-user')]);

        

        // category
        

    });

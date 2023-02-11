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
        Route::prefix('gallery')->group(function() {
            Route::get('/', 'GalleryController@index')->name('gallery.index');
            Route::get('/delete/{id}', 'GalleryController@destroy')->name('gallery.delete');
            Route::get('/add', 'GalleryController@create')->name('gallery.add');
            Route::post('/postadd', 'GalleryController@postAdd')->name('gallery.postAdd');
            Route::post('/handle-upload', 'GalleryController@handleUpload')->name('gallery.handleUpload');
            Route::post('/sort', 'GalleryController@sort')->name('gallery.sort');
        });
    });

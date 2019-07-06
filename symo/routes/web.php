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

use Illuminate\Support\Facades\Route;

Route::group(['middleware'=>'auth'],function() {
    Route::get('/', 'HomeController@index')->name('home');
    Route::group(['prefix' => 'admin/'], function ($id) {
        Route::resource('customers', 'Admin\CustomersController');
        Route::resource('operators', 'Admin\OperatorsController');
        Route::resource('sellers', 'Admin\SellersController');
        Route::resource('designers', 'Admin\DesignersController');
        Route::resource('sets', 'Admin\SetsController');
        Route::resource('clothes', 'Admin\ClothesController');
        Route::resource('shops', 'Admin\ShopsController');
        Route::resource('settings', 'Admin\SettingController');
        Route::resource('category', 'Admin\Category\CategoryController');
        Route::resource('categoryproperties', 'Admin\Category\CategoryPropertiesController');
        Route::resource('categorypropertiesdata', 'Admin\Category\CategoryPropertiesDataController');
        Route::resource('seasons', 'Admin\Category\SeasonController');
        Route::resource('colors', 'Admin\Category\ColorController');
        Route::group(['prefix' => 'get/'], function ($id) {
            Route::post('oplist', 'Admin\OperatorsController@datatable')->name('get.op.data');
            Route::post('sellist', 'Admin\SellersController@datatable')->name('get.sel.data');
            Route::post('cuslist', 'Admin\CustomersController@datatable')->name('get.cus.data');
            Route::post('deslist', 'Admin\DesignersController@datatable')->name('get.des.data');
            Route::post('shoplist', 'Admin\ShopsController@datatable')->name('get.shop.data');
            Route::post('clothlist', 'Admin\ClothesController@datatable')->name('get.cloth.data');
            Route::post('catlist', 'Admin\Category\CategoryController@datatable')->name('get.cat.data');
            Route::post('catplist', 'Admin\Category\CategoryPropertiesController@datatable')->name('get.catp.data');
            Route::post('catpdlist', 'Admin\Category\CategoryPropertiesDataController@datatable')->name('get.catpd.data');
            Route::post('seasonlist', 'Admin\Category\SeasonController@datatable')->name('get.seasons.data');
            Route::post('colorlist', 'Admin\Category\ColorController@datatable')->name('get.color.data');
        });
        Route::group(['prefix' => 'api/'], function ($id) {
            Route::post('photo', 'Admin\ApiController@uploadfile')->name('admin.photo.upload');
            Route::post('unphoto', 'Admin\ApiController@deletefile')->name('admin.photo.del');

        });
    });
});
    Route::post('/fetchcatp','Admin\ApiController@fetchCategoryProperties');
    Route::get('/fetchcatp2','Admin\ApiController@CategoryProperties');
    Route::get('/fetchcat/{id}','Admin\ApiController@loadpage');
    Route::group([ 'prefix'=>'api/'],function () {
        Route::post('backgroundday', 'Api\ApiController@backgroundDay');
        Route::post('clothes', 'Api\ApiController@clothes');
    });







Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

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
Auth::routes();

Route::group(['middleware'=>'auth'],function(){
   Route::get('/','HomeController@index')->name('home');
    Route::group(['prefix'=>'admin/'],function($id){
       Route::resource('customers','Admin\CustomersController');
       Route::resource('operators','Admin\OperatorsController');
       Route::resource('sellers','Admin\SellersController');
       Route::resource('designers','Admin\DesignersController');
       Route::resource('sets','Admin\SetsController');
       Route::resource('clothes','Admin\ClothesController');
       Route::resource('settings','Admin\SettingController');
       Route::post('oplist','Admin\OperatorsController@datatable')->name('get.data');
       Route::get('oplist','Admin\OperatorsController@datatable')->name('get.data');

    });
});
Route::get('/fetchcatp','Admin\ApiController@categoryProperties');
Route::get('/fetchcat/{id}','Admin\ApiController@loadpage');
Route::group([ 'prefix'=>'api/'],function (){
    Route::post('backgroundday','Api\ApiController@backgroundDay');
    Route::post('clothes','Api\ApiController@clothes');


});
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
       Route::resource('customers','Admin\CustomerController');
       Route::resource('clothes','Admin\ClothesController');
       Route::resource('settings','Admin\SettingController');
       Route::resource('sets','Admin\SetsController');

    });
});
Route::get('/fetchcatp','Admin\ApiController@categoryProperties');
Route::get('/fetchcat/{id}','Admin\ApiController@loadpage');
Route::group([ 'prefix'=>'api/'],function (){
    Route::post('backgroundday','Api\ApiController@backgroundDay');
    Route::post('clothes','Api\ApiController@clothes');


});
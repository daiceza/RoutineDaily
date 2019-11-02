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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'],function(){
    Route::get('profile/create','Admin\ProfileController@add');
    Route::get('profile/edit','Admin\ProfileController@edit');
    Route::post('profile/edit','Admin\ProfileController@update');
    Route::get('profile/delete','Admin\ProfileController@delete');
    
});
//ページ移動
Route::group(['prefix' => 'worker'],function(){
    Route::get('users','Worker\UsersController@users');
    Route::get('daily','Worker\DailyController@daily');
    Route::get('routine','Worker\RoutineController@routine');
    Route::get('list','Worker\ListController@list');
    
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

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
//管理者
Route::group(['prefix' => 'admin'],function(){
    Route::get('profile/create','Admin\ProfileController@add');
    Route::post('profile/create','Admin\ProfileController@create');
    Route::get('profile/edit','Admin\ProfileController@edit');
    Route::post('profile/edit','Admin\ProfileController@update');
    Route::get('profile/delete','Admin\ProfileController@delete');
    Route::get('profile','Admin\ProfileController@index');
});
//ページ移動
Route::group(['prefix' => 'worker'],function(){
    Route::get('users','Worker\UsersController@users');
    Route::get('daily','Worker\DailyController@daily');
    Route::get('routine','Worker\RoutineController@routine');
    Route::get('list','Worker\ListController@list');
    
    Route::get('routine/create','Worker\RoutineController@add');
    Route::post('routine/create','Worker\RoutineController@create');
    Route::get('routine/edit','Worker\RoutineController@edit');
    Route::post('routine/edit','Worker\RoutineController@update');
    Route::post('routine/','worker\RoutineController@delete');
    
    Route::get('daily/create','Worker\DailyController@add');
    Route::post('daily/create','worker\DailyController@create');
    
});
//ログイン
Auth::routes();
/*Route::group(['middleware'=> ['auth','can:admin']],function(){
    Route::get('admin','BanController@user');
});*/


Route::get('/home', 'HomeController@index')->name('home');

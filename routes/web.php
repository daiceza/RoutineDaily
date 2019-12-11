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
Route::get('/', 'Controller@welcome')->name('welcome');
//管理者
Route::group(['prefix' => 'admin','middleware'=>['auth','can:admin']],function(){
    
    Route::get('employee/create','Admin\EmployeeController@add');
    Route::post('employee/create','Admin\EmployeeController@create');
    Route::get('employee/edit','Admin\EmployeeController@edit');
    Route::post('employee/edit','Admin\EmployeeController@update');
    Route::get('employee/delete','Admin\EmployeeController@delete');
    Route::get('employee','Admin\EmployeeController@employee');
    Route::get('config','Admin\ConfigController@config');
    Route::post('config','Admin\ConfigController@update');
});


//ユーザー登録
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

//ページ移動
Route::group(['prefix' => 'worker','middleware'=>'auth'],function(){
    Route::get('users','Worker\UsersController@users');
    Route::get('daily','Worker\DailyController@daily');
    Route::get('routine','Worker\RoutineController@routine');
    Route::get('employee','Worker\EmployeeController@employee');
    //仕事リスト編集
    Route::get('routine/create','Worker\RoutineController@add');
    Route::post('routine/create','Worker\RoutineController@create');
    Route::get('routine/edit','Worker\RoutineController@edit');
    Route::post('routine/edit','Worker\RoutineController@update');
    Route::get('routine/delete','Worker\RoutineController@delete');
    //日報編集
    Route::get('daily/create','Worker\DailyController@add');
    Route::post('daily/create','Worker\DailyController@create');
    Route::get('daily/edit','Worker\DailyController@edit');
    Route::post('daily/edit','Worker\DailyController@update');
    Route::get('daily/delete','Worker\DailyController@delete');
    Route::post('daily','Worker\DailyController@next');
    //従業員リスト
    Route::get('employee/daily','Worker\EmployeeController@daily');
    Route::get('employee/routine','Worker\EmployeeController@routine');
    Route::get('employee/routine/details','Worker\EmployeeController@details');
    //プロフィール確認・パスワード・メールアドレス変更
    Route::get('employee/edit','Worker\EmployeeController@edit');
    Route::post('employee/edit','Worker\EmployeeController@update');
    
});

//Auth::routes();
// Authentication Routes...
Route::get('login','Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

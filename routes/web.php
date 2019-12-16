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
Route::get('admin/employee/create','Admin\EmployeeController@add');
Route::post('admin/employee/create','Admin\EmployeeController@create');
Route::get('admin/employee/edit','Admin\EmployeeController@edit');
Route::post('admin/employee/edit','Admin\EmployeeController@update');
Route::get('admin/employee/delete','Admin\EmployeeController@delete');
Route::get('admin/employee','Admin\EmployeeController@employee');


//ユーザー登録
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

//ページ移動
Route::get('worker/daily','Worker\DailyController@daily');
Route::get('worker/routine','Worker\RoutineController@routine');
Route::get('worker/employee','Worker\EmployeeController@employee');
//仕事リスト編集
Route::get('worker/routine/create','Worker\RoutineController@add');
Route::post('worker/routine/create','Worker\RoutineController@create');
Route::get('worker/routine/edit','Worker\RoutineController@edit');
Route::post('worker/routine/edit','Worker\RoutineController@update');
Route::get('worker/routine/delete','Worker\RoutineController@delete');
//日報編集
Route::get('worker/daily/create','Worker\DailyController@add');
Route::post('worker/daily/create','Worker\DailyController@create');
Route::get('worker/daily/edit','Worker\DailyController@edit');
Route::post('worker/daily/edit','Worker\DailyController@update');
Route::get('worker/daily/delete','Worker\DailyController@delete');
Route::post('worker/daily','Worker\DailyController@next');
//日報リスト
Route::get('worker/dailylist','Worker\DailyController@list');
//従業員リスト
Route::get('worker/employee/daily','Worker\EmployeeController@daily');
Route::get('worker/employee/routine','Worker\EmployeeController@routine');
Route::get('worker/employee/routine/details','Worker\EmployeeController@details');
//プロフィール確認・パスワード・メールアドレス変更
Route::get('worker/employee/edit','Worker\EmployeeController@edit');
Route::post('worker/employee/edit','Worker\EmployeeController@update');

//Auth::routes();
// Authentication Routes...
Route::get('login','Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

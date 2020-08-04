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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'citizen','namespace'=>'Citizen'], function () {
    Route::get('homecitizen',['as'=>'homecitizen','uses'=>'HomeController@index']);
});


Route::group(['prefix' => 'manager', 'namespace' => 'Manager'], function () {
    Route::get('homemanager', ['as' => 'homemanager', 'uses' => 'HomeController@index']);
});


Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('homeadmin', ['as' => 'homeadmin', 'uses' => 'HomeController@index']);
    Route::get('login',['as' => 'login', 'uses' => 'AccoutController@login']);
    Route::post('handle-login',['as'=>'handle-login','uses'=>'AccoutController@handleLogin']);
    Route::get('logout',['as'=>'logout','uses'=> 'AccoutController@logout']);

    Route::get('admin_list_nhanvien',['as'=>'admin_list_nhanvien' , 'uses' => 'HomeController@getListNhanvien' ]);
    Route::get('admin_list_congdan', ['as' => 'admin_list_congdan', 'uses' => 'HomeController@getListCongdan']);
    Route::get('admin_list_linhvuc', ['as' => 'admin_list_linhvuc', 'uses' => 'HomeController@getListLinhvuc']);
    Route::get('admin_list_thutuc', ['as' => 'admin_list_thutuc', 'uses' => 'HomeController@getListThutuc']);
    Route::get('admin_list_hoso', ['as' => 'admin_list_hoso', 'uses' => 'HomeController@getListHoso']);
});
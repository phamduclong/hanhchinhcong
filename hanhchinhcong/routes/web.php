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
    Route::get('bothutuc',['as'=>'bothutuc','uses'=>'HomeController@boThuTuc']);
    Route::get('detail_thutuc/{id}',['as'=>'detail_thutuc','uses'=>'HomeController@detailThuTuc']);
    Route::get('nop_ho_so/{id}',['as'=>'nop_ho_so','uses'=>'HomeController@nopHoSo']);
    Route::post('post-hoso/{idThutuc}',['as'=>'post-hoso','uses'=>'HomeController@postHoso']);
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
    Route::post('post-block-nhanvien/{id}',['as'=> 'post-block-nhanvien','uses'=>'HomeController@postBlockNhanvien']);
    Route::get('add-nhanvien',['as'=>'add-nhanvien','uses'=>'HomeController@addNhanvien']);
    Route::post('post-add-nhanvien',['as'=> 'post-add-nhanvien','uses'=>'HomeController@postAddNhanvien']);
    Route::get('edit-nhanvien/{id}', ['as' => 'edit-nhanvien', 'uses' => 'HomeController@editNhanvien']);
    Route::post('post-edit-nhanvien/{id}',['as'=> 'post-edit-nhanvien','uses'=>'HomeController@postEditNhanvien']);
    Route::get('delete-nhanvien/{id}',['as'=>'delete-nhanvien','uses'=>'HomeController@deleteNhanvien']);
    Route::post('search-nhanvien',['as'=>'search-nhanvien','uses'=>'HomeController@searchNhanvien']);

    Route::get('admin_list_congdan', ['as' => 'admin_list_congdan', 'uses' => 'HomeController@getListCongdan']);
    Route::post('post-block-congdan/{id}', ['as' => 'post-block-congdan', 'uses' => 'HomeController@postBlockCongdan']);


    Route::get('admin_list_linhvuc', ['as' => 'admin_list_linhvuc', 'uses' => 'HomeController@getListLinhvuc']);
    Route::get('admin_list_thutuc', ['as' => 'admin_list_thutuc', 'uses' => 'HomeController@getListThutuc']);
    Route::get('admin_list_hoso', ['as' => 'admin_list_hoso', 'uses' => 'HomeController@getListHoso']);
});
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

    //Đăng ký, Đăng nhập
    Route::get('dangky',['as'=>'dangky','uses'=>'CitizenController@dangKy']);
    Route::post('handle-dangky',['as'=>'handle-dangky','uses'=>'CitizenController@handleDangky']);
    Route::get('dangnhap',['as'=>'dangnhap','uses'=>'CitizenController@dangNhap']);
    Route::post('handle-dangnhap',['as'=>'handle-dangnhap','uses'=>'CitizenController@handleDangnhap']);
    Route::get('dangxuat',['as'=>'dangxuat','uses'=>'CitizenController@dangXuat']);

    //Tra cứu hồ sơ
    Route::get('tracuuhoso',['as'=>'tracuuhoso','uses'=>'HomeController@traCuuHoSo']);
    Route::get('edit-file-hoso/{id}',['as'=> 'edit-file-hoso','uses'=>'HomeController@editFileHoso']);
    Route::post('post-edit-file-hoso/{id}',['as'=> 'post-edit-file-hoso','uses'=>'HomeController@postEditFileHoso']);
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
    Route::get('add-linhvuc',['as'=>'add-linhvuc','uses'=>'HomeController@addLinhvuc']);
    Route::post('post-add-linhvuc',['as'=>'post-add-linhvuc','uses'=>'HomeController@postAddLinhvuc']);
    Route::get('edit-linhvuc/{id}',['as'=>'edit-linhvuc','uses'=>'HomeController@editLinhvuc']);
    Route::post('post-edit-linhvuc/{id}',['as'=>'post-edit-linhvuc','uses'=>'HomeController@postEditLinhvuc']);
    Route::get('delete-linhvuc/{id}',['as'=>'delete-linhvuc','uses'=>'HomeController@deleteLinhvuc']);


    Route::get('admin_list_thutuc', ['as' => 'admin_list_thutuc', 'uses' => 'HomeController@getListThutuc']);
    Route::get('add-thutuc',['as'=>'add-thutuc','uses'=>'HomeController@addThutuc']);
    Route::post('post-add-thutuc',['as'=>'post-add-thutuc','uses'=>'HomeController@postAddThutuc']);
    Route::get('edit-thutuc/{id}', ['as' => 'edit-thutuc', 'uses' => 'HomeController@editThutuc']);
    Route::post('post-edit-thutuc/{id}', ['as' => 'post-edit-thutuc', 'uses' => 'HomeController@postEditThutuc']);
    Route::get('delete-thutuc/{id}',['as'=>'delete-thutuc','uses'=>'HomeController@deleteThutuc']);


    Route::get('admin_list_hoso', ['as' => 'admin_list_hoso', 'uses' => 'HomeController@getListHoso']);
    Route::get('nhan-ho-so/{id}',['as'=>'nhan-ho-so','uses'=>'HomeController@nhanHoSo']);
    Route::get('tra-ho-so/{id}', ['as' => 'tra-ho-so', 'uses' => 'HomeController@traHoSo']);
    Route::get('ghi-chu-ho-so/{id}', ['as' => 'ghi-chu-ho-so', 'uses' => 'HomeController@ghiChuHoSo']);
    Route::post('post-ghi-chu-ho-so/{id}',['as'=>'post-ghi-chu-ho-so','uses'=>'HomeController@postGhiChuHoSo']);



    Route::get('xu-ly-thong-bao-tu-cong-dan',['as'=> 'xu-ly-thong-bao-tu-cong-dan','uses'=>'HomeController@xuLyThongBao']);
    Route::get('delete-all-message',['as'=>'delete-all-message','uses'=>'HomeController@deleteAllMessage']);

});
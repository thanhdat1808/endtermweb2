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

Route::get( '/index' ,'MyController@gethome');
Route::get('/chitiet','MyController@Getchitiet');
Route::get('/dangky',function(){
    return view('dangky');
});
Route::post( '/login' ,'MyController@Postlogin')->name('dangnhap');
Route::get( '/logout' ,'MyController@Getlogout');
Route::post( '/addacc' ,'MyController@Postaddacc');
Route::get('/addcart', 'MyController@Getaddcart');
Route::get('/admin','MyController@Getadmin');
Route::get('/themsp',function(){
    return view('themsp');
});
Route::get('/addpro','MyController@Getaddpro');
Route::get('/delete','MyController@Getdelete');
Route::get('/edit','MyController@Getedit');
Route::get('/update','MyController@Getupdate');
Route::get('/khachhang','MyController@Getkhachhang');
Route::get('/qldonhang','MyController@Getqldonhang');
Route::get('/capnhat','MyController@Getcapnhat');
Route::get('/ctdonhang','MyController@Getctdonhang');
Route::get('/doanhthu','MyController@Getdoanhthu');
Route::get('/addcart','MyController@Getaddcart');
Route::get('/cart','MyController@Getcart');
Route::get('/order','MyController@Getorder');
Route::get('/thanhtoan','MyController@Getthanhtoan');
Route::get('/account','MyController@Getaccount');
Route::get('/editcart','MyController@Geteditcart');
Route::get('/deletecart','MyController@Geteditcart');
Route::get('/updateacc','MyController@Getupdateacc');
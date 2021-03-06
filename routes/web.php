<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });



Auth::routes();

Route::get('home', 'HomeController@index')->name('home');

Route::get('/','FrontController@home')->name('front');

Route::get('contact','FrontController@contact')->name('front.contact');

Route::get('lelang','FrontController@lelang')->name('front.lelang');

Route::get('lelang/detail/{id}','FrontController@lelangshow')->name('front.lelangshow');

Route::post('lelang/detail','BidController@store')->name('front.lelang.bid');

// Admin

Route::get('admin/login', 'Auth\AdminAuthController@getLogin')->name('admin.login');

Route::post('admin/login', 'Auth\AdminAuthController@postLogin');

Route::get('admin/logout','Auth\AdminAuthController@postLogout')->name('admin.logout');

Route::middleware('auth:admin')->group(function(){

Route::prefix('admin')->group(function() {

Route::get('dashboard','DashboardController@index')->name('admin.dashboard');

// Manage Staff
Route::get('staff','StaffController@index')->name('admin.staff');

Route::get('staff/create','StaffController@create')->name('admin.staff.create');

Route::post('staff/create','staffController@store')->name('admin.staff.store');

Route::get('staff/edit/{id}','StaffController@edit')->name('admin.staff.edit');

Route::post('staff/edit/{id}','StaffController@update')->name('admin.staff.update');

Route::delete('staff/destroy/{id}','StaffController@destroy')->name('admin.staff.destroy');

Route::get('staff/trash','StaffController@trash')->name('admin.staff.trash');

Route::post('staff/{id}/restore','StaffController@restore')->name('admin.staff.restore');

Route::delete('staff/{id}/delete-permanent','StaffController@deletePermanent')->name('admin.staff.delete-permanent');


// Manage User
Route::get('user','UserController@index')->name('admin.user');

Route::get('user/submission','UserController@submission')->name('admin.user.submission');

Route::get('user/edit/{id}','UserController@edit')->name('admin.user.edit');

Route::post('user/edit/{id}','UserController@update')->name('admin.user.update');

Route::delete('user/destroy/{id}','UserController@destroy')->name('admin.user.destroy');

Route::get('user/trash','UserController@trash')->name('admin.user.trash');

Route::post('user/{id}/restore','UserController@restore')->name('admin.user.restore');

Route::delete('user/{id}/delete-permanent','UserController@deletePermanent')->name('admin.user.delete-permanent');


// Manage Wilayah Penangkapan
Route::get('wilayah-penangkapan','WilayahController@index')->name('admin.wilayah');

Route::get('wilayah-penangkapan/create','WilayahController@create')->name('admin.wilayah.create');

Route::post('wilayah-penangkapan/create','WilayahController@store')->name('admin.wilayah.store');

Route::get('wilayah-penangkapan/edit/{id}','WilayahController@edit')->name('admin.wilayah.edit');

Route::post('wilayah-penangkapan/edit/{id}','WilayahController@update')->name('admin.wilayah.update');

Route::delete('wilayah-pengkapan/{id}/destroy','WilayahController@destroy')->name('admin.wilayah.destroy');

// Manage Jenis Ikan

Route::get('jenis-ikan','JenisikanController@index')->name('admin.jenisikan');

Route::get('jenis-ikan/print','JenisikanController@print')->name('admin.jenisikan.print');

Route::get('jenis-ikan/create','JenisikanController@create')->name('admin.jenisikan.create');

Route::post('jenis-ikan/create','JenisikanController@store')->name('admin.jenisikan.store');

Route::get('jenis-ikan/edit/{id}','JenisikanController@edit')->name('admin.jenisikan.edit');

Route::post('jenis-ikan/edit/{id}','JenisikanController@update')->name('admin.jenisikan.update');

Route::delete('jenis-ikan/{id}/destroy','JenisikanController@destroy')->name('admin.jenisikan.destroy');

// Manage Data Ikan
Route::get('data-ikan','IkanController@index')->name('admin.ikan');

Route::get('data-ikan/create','IkanController@create')->name('admin.ikan.create');

Route::post('data-ikan/create','IkanController@store')->name('admin.ikan.store');

Route::get('data-ikan/show/{id}','IkanController@show')->name('admin.ikan.show');

Route::get('data-ikan/edit/{id}','IkanController@edit')->name('admin.ikan.edit');

Route::post('data-ikan/edit/{id}','IkanController@update')->name('admin.ikan.update');

Route::get('data-ikan/lelang/{id}','IkanController@lelang')->name('admin.ikan.lelang');

Route::post('data-ikan/lelang','IkanController@lelangstore')->name('admin.ikan.lelangstore');

Route::delete('data-ikan/destroy/{id}','IkanController@destroy')->name('admin.ikan.destroy');

Route::get('data-ikan/trash','IkanController@trash')->name('admin.ikan.trash');

Route::post('data-ikan/{id}/restore','IkanController@restore')->name('admin.ikan.restore');

Route::delete('data-ikan/{id}/delete-permanent','IkanController@deletePermanent')->name('admin.ikan.delete-permanent');


// Manage Lelang
Route::get('data-lelang','LelangController@index')->name('admin.lelang');

Route::get('lelang/create','LelangController@create')->name('admin.lelang.create');

Route::post('lelang/create','LelangController@store')->name('admin.lelang.store');

Route::get('lelang/show/{id}','LelangController@show')->name('admin.lelang.show');

Route::post('lelang/show/{id}','LelangController@setpemenang')->name('admin.lelang.setpemenang');

Route::get('lelang/edit/{id}','LelangController@edit')->name('admin.lelang.edit');

Route::post('lelang/edit/{id}','LelangController@update')->name('admin.lelang.update');

Route::delete('lelang/destroy/{id}','LelangController@destroy')->name('admin.lelang.destroy');

Route::get('lelang/trash','LelangController@trash')->name('admin.lelang.trash');

Route::post('lelang/{id}/restore','LelangController@restore')->name('admin.lelang.restore');

Route::delete('lelang/{id}/delete-permanent','LelangController@deletePermanent')->name('admin.lelang.delete-permanent');

Route::get('lelang/on-progress','LelangController@onprogress')->name('admin.lelang.onprogress');

Route::get('lelang/done','LelangController@done')->name('admin.lelang.done');

Route::get('lelang/cancel','LelangController@cancel')->name('admin.lelang.cancel');

// Manage Data Nelayan
Route::get('nelayan','NelayanController@index')->name('admin.nelayan');

Route::get('nelayan/create','NelayanController@create')->name('admin.nelayan.create');

Route::post('nelayan/create','NelayanController@store')->name('admin.nelayan.store');

Route::get('nelayan/edit/{id}','NelayanController@edit')->name('admin.nelayan.edit');

Route::post('nelayan/edit/{id}','NelayanController@update')->name('admin.nelayan.update');

Route::delete('nelayan/destroy/{id}','NelayanController@destroy')->name('admin.nelayan.destroy');

Route::get('nelayan/trash','NelayanController@trash')->name('admin.nelayan.trash');

Route::post('nelayan/{id}/restore','NelayanController@restore')->name('admin.nelayan.restore');

Route::delete('nelayan/{id}/delete-permanent','NelayanController@deletePermanent')->name('admin.nelayan.delete-permanent');

// Manage Cabang
Route::get('cabang','CabangController@index')->name('admin.cabang');

Route::get('cabang/create','CabangController@create')->name('admin.cabang.create');

Route::post('cabang/create','CabangController@store')->name('admin.cabang.store');

Route::get('cabang/edit/{id}','CabangController@edit')->name('admin.cabang.edit');

Route::post('cabang/edit/{id}','CabangController@update')->name('admin.cabang.update');

Route::delete('cabang/destroy/{id}','CabangController@destroy')->name('admin.cabang.destroy');

// Setting
// Banner Slider
Route::get('banner-slider','BannersliderController@index')->name('admin.banner');

Route::get('banner-slider/create','BannersliderController@create')->name('admin.banner.create');

Route::post('banner-slider/create','BannersliderController@store')->name('admin.banner.store');

Route::get('banner-slider/edit/{id}','BannersliderController@edit')->name('admin.banner.edit');

Route::post('banner-slider/edit/{id}','BannersliderController@update')->name('admin.banner.update');

Route::delete('banner-slider/destroy/{id}','BannersliderController@destroy')->name('admin.banner.destroy');

// General Setting
Route::get('general-setting','GeneralsettingController@index')->name('admin.generalsetting');

Route::get('general-setting/edit/{id}','GeneralsettingController@edit')->name('admin.generalsetting.edit');

Route::post('general-setting/edit/{id}','GeneralsettingController@update')->name('admin.generalsetting.update');

// Route::post('general-setting/edit/favicon/{id}','GeneralsettingController@faviconupdate')->name('admin.generalsetting.faviconupdate');

Route::get('report/ikan','ReportController@ikanprint')->name('admin.report.ikan');

Route::get('report/lelang','ReportController@lelangprint')->name('admin.report.lelang');

Route::get('report/nelayan','ReportController@nelayanprint')->name('admin.report.nelayan');

Route::get('report/user','ReportController@userprint')->name('admin.report.user');

Route::get('report/staff','ReportController@staffprint')->name('admin.report.staff');

});

});
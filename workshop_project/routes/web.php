<?php

use App\Http\Controllers\Backend\ArtikelController;
use App\Http\Controllers\Frontend\ArtikelController as AppArtikelController;
use App\Http\Controllers\Frontend\VideosController;
use App\Http\Controllers\UploadVideoController;
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
//     return view('backend.dashboard');
// });
Route::get('/coba', function () {
    return view('welcome');
});
Route::get('/error', function () {
  
  return view('error');
})->name('error.403');

Route::group(['namespace' => 'Backend', 'middleware' => ['auth', 'web','admin']] ,function(){
  Route::prefix('admin')->group(function () {
    Route::resource('/', DashboardController::class);
    Route::resource('video', VideoController::class);
    Route::resource('yayasan', YayasanController::class);
    Route::resource('donasi', DonasiController::class);
    Route::resource('artikel', 'ArtikelController');
    Route::resource('acara', AcaraController::class);
    Route::post('artikel/{id}/edit', 'ArtikelController@update')->name('artikel.updates');
    Route::put('donasi/nonactive/{donasi}','DonasiController@nonactive')->name('donasi.nonactive');
    Route::put('donasi/active/{donasi}','DonasiController@active')->name('donasi.active');
    Route::get('konfirmasi','DonasiController@konfirmasiDonasi')->name('donasi.konfirmasi');
    Route::get('detaildonasi/{id}','DonasiController@DetailDonasi')->name('donasi.detail');
    Route::put('detail/approve/{detaildonasi}','DonasiController@approve')->name('detail.approve');
    Route::put('detail/disapprove/{detaildonasi}','DonasiController@disapprove')->name('detail.disapprove');
  });
});
Route::group(['namespace' => 'Frontend'] ,function(){
  Route::get('/','UserController@index')->name('home');
  Route::get('/artikel', 'ArtikelController@index')->name('artikell.index');
  Route::get('/artikel/{url_artikel}', 'ArtikelController@show')->name('artikell.show');
  Route::get('/yayasan','YayasanUserController@index')->name('yayasanuser.index');
  Route::get('/yayasan/{id}','YayasanUserController@show')->name('yayasanuser.show');
  Route::get('/video', 'VideosController@index')->name('videos.index');
  Route::get('/video/{id}', 'VideosController@show')->name('videos.show');
  Route::get('/donasi', 'DonasiUserController@index')->name('donasiuser.index');
  Route::get('/donasi/{id}', 'DonasiUserController@show')->name('donasiuser.show');
  Route::post('/donasi', 'DonasiUserController@donate')->name('donate');
  Route::get('/acara', 'AcaraUserController@index')->name('acarauser.index');
  Route::get('/acara/{id}', 'AcaraUserController@show')->name('acarauser.show');
  Route::get('/listdonasi', 'DonasiUserController@list')->name('donasiuser.list');
  Route::get('/uploadbukti/donasi/{id}', 'DonasiUserController@uploadbukti')->name('donasiuser.upload');
  Route::put('/uploadbukti/donasi/{id}', 'DonasiUserController@updatebukti')->name('donasiuser.update');
});

Auth::routes();

Route::get('/user', [App\Http\Controllers\HomeController::class, 'index'])->name('user');
Route::get('/clear-cache', function() {
  $exitCode = Artisan::call('config:cache');
  return 'DONE'; //Return anything
});
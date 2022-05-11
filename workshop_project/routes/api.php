<?php

use App\Http\Controllers\Api\ArtikelApiController;
use App\Http\Controllers\Api\LoginApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\HttpCache\Store;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['namespace' => 'Api'] ,function(){
    Route::get('/artikel','ArtikelApiController@index')->name('artikelapi.index');
    Route::get('/artikel/{id}','ArtikelApiController@show')->name('artikelapi.show');
    Route::get('/yayasan','YayasanApiController@index')->name('yayasanapi.index');
    Route::get('/yayasan/{id}','YayasanApiController@show')->name('yayasanapi.show');
    Route::post('/login', 'LoginApiController@store')->name('login.store');
    Route::post('/register', 'RegisterApiController@store')->name('register.store');
    Route::get('/donasi', 'DonasiApiController@index')->name('donasiapi.index');
    Route::get('/cari', 'ArtikelApiController@search')->name('artikel.search');
    Route::get('/cari/yayasan', 'YayasanApiController@search')->name('yayasan.search');
    Route::get('/acara','AcaraApiController@index');
    Route::get('/video','VideoApiController@index');
    Route::post('/donate', 'DonasiApiController@donate')->name('donate.api')->middleware('auth:sanctum');
    Route::put('/uploadbukti', 'DonasiApiController@uploadBukti')->name('donate.uploadBukti');
    Route::get('/listdonate', 'DonasiApiController@listDonate')->name('donate.list')->middleware('auth:sanctum');
});
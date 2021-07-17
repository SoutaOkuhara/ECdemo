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

Route::get('/', function () {
    return view('welcome');
});

Route::get('product','IndexController@index')->middleware("auth");
Route::get('product/add','IndexController@add');
Route::post('product/add','IndexController@create');
Route::get('product/edit','IndexController@edit');
Route::post('product/edit','IndexController@update');
Route::get('product/del','IndexController@del');
Route::post('product/del','IndexController@remove');
Route::get('product/shop','IndexController@shop');
Route::post('product/shop','IndexController@postSession');

Route::get('user','userController@index')->middleware("auth");
Route::post('user','userController@post');
Route::get('user/add','userController@add');
Route::post('user/add','userController@create');
Route::get('user/auth','userController@getAuth');
Route::post('user/auth','userController@postAuth');


Route::get('company','CompanyController@index')->middleware("auth");
Route::get('company/add','CompanyController@add');
Route::post('company/add','CompanyController@create');
Route::get('company/del','CompanyController@del');
Route::post('company/del','CompanyController@remove');
Route::get('company/edit','CompanyController@edit');
Route::post('company/edit','CompanyController@update');

Route::get('contact/list','ContactController@index')->middleware("auth");
Route::get('contact','ContactController@add');
Route::post('contact','ContactController@create');

Route::get('person','PersonController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

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
Route::post('product/shop','IndexController@postSession')->middleware("auth");
Route::post('product/search','IndexController@search');
Route::post('product/fav','IndexController@fav');
Route::get('product/detailadd','IndexController@detailaddget')->middleware("auth");
Route::post('product/detailadd','IndexController@detailaddpost');
Route::post('product/detail','IndexController@detail');


Route::get('user','UserController@index')->middleware("auth");
Route::get('user/auth','UserController@getAuth');
Route::post('user/auth','UserController@postAuth');
Route::get('user/logout','UserController@logout');


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
Route::get('contact/anslist','ContactController@answerlist')->middleware("auth");
Route::get('contact/ans','ContactController@ansget');
Route::post('contact/ans','ContactController@anspost');

Route::get('person','PersonController@index');

Route::post('review','ReviewController@index')->middleware("auth");
Route::post('review/add','ReviewController@add');

Route::get('mypage','MyPageController@index')->middleware("auth");
Route::post('mypage','MyPageController@del');
Route::get('mypage/basket','MyPageController@basket')->middleware("auth");
Route::post('mypage/basket','MyPageController@basketdel');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

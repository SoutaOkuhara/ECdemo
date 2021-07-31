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
Route::get('product/add','IndexController@add')->middleware("auth");
Route::post('product/add','IndexController@create');
Route::get('product/edit','IndexController@edit')->middleware("auth");
Route::post('product/edit','IndexController@update');
Route::get('product/del','IndexController@del')->middleware("auth");
Route::post('product/del','IndexController@remove');
Route::get('product/shop','IndexController@shop');
Route::post('product/shop','IndexController@postSession');
Route::post('product/search','IndexController@search');
Route::post('product/fav','IndexController@fav');
Route::get('product/detailadd','IndexController@detailaddget')->middleware("auth");
Route::post('product/detailadd','IndexController@detailaddpost');
Route::post('product/detail','IndexController@detail')->middleware("auth");
Route::get('product/sales','IndexController@sales')->middleware("auth");


Route::get('user','UserController@index')->middleware("auth");
Route::get('user/auth','UserController@getAuth');
Route::post('user/auth','UserController@postAuth');
Route::get('user/logout','UserController@logout');


Route::get('company','CompanyController@index')->middleware("auth");
Route::get('company/add','CompanyController@add')->middleware("auth");
Route::post('company/add','CompanyController@create');
Route::get('company/del','CompanyController@del')->middleware("auth");
Route::post('company/del','CompanyController@remove');
Route::get('company/edit','CompanyController@edit')->middleware("auth");
Route::post('company/edit','CompanyController@update');

Route::get('contact/list','ContactController@index');
Route::get('contact','ContactController@add');
Route::post('contact','ContactController@create');
Route::get('contact/anslist','ContactController@answerlist')->middleware("auth");
Route::get('contact/ans','ContactController@ansget')->middleware("auth");
Route::post('contact/ans','ContactController@anspost');

Route::get('person','PersonController@index');

Route::post('review','ReviewController@index');
Route::post('review/add','ReviewController@add');

Route::get('mypage','MyPageController@index')->middleware("auth");
Route::post('mypage','MyPageController@del');
Route::get('mypage/basket','MyPageController@basket')->middleware("auth");
Route::post('mypage/basket','MyPageController@basketdel');
Route::get('mypage/buy','MyPageController@buy')->middleware("auth");
Route::post('mypage/buy','MyPageController@thanks');
Route::post('mypage/view/del','MyPageController@viewDel');
Route::get('mypage/chat','MyPageController@chat')->middleware("auth");
Route::post('mypage/chat','MyPageController@chatpost');
Route::get('mypage/chatUser','MyPageController@chatUser')->middleware("auth");
Route::get('mypage/chatAdmin','MyPageController@chatAdmin')->middleware("auth");
Route::post('mypage/chatAdmin','MyPageController@chatAdminpost')->middleware("auth");

Route::get('timeline','TimelineController@index');
Route::get('timeline/add','TimelineController@add')->middleware("auth");
Route::post('timeline/add','TimelineController@create');
Route::get('timeline/comment','TimelineController@comment')->middleware("auth");
Route::post('timeline/comment','TimelineController@commentpost')->middleware("auth");
Route::get('timeline/good','TimelineController@good');
Route::get('timeline/bad','TimelineController@bad');
Route::get('timeline/comment/good','TimelineController@goodcomment');
Route::get('timeline/comment/bad','TimelineController@badcomment');

Route::get('index','MenuController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

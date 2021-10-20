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

//ユーザー側

//ユーザー側topページ
Route::get('/','MenuController@index');

//ユーザー側商品
Route::group(['prefix' => 'product'], function () {
    Route::get('/','IndexController@shop');
    Route::post('/','IndexController@postSession');
    Route::post('/search','IndexController@search');
    Route::post('/fav','IndexController@fav');
    Route::post('/detail','IndexController@detail')->middleware("auth");
});

//ユーザー運用
Route::group(['prefix' => 'user'], function () {
    Route::get('/','UserController@index')->middleware("auth");
    Route::get('/auth','UserController@getAuth');
    Route::post('/auth','UserController@postAuth');
    Route::get('/logout','UserController@logout');
});

//ユーザー側お問い合わせ
Route::group(['prefix' => 'contact'], function () {
    Route::get('/list','ContactController@index');
    Route::get('/','ContactController@add');
    Route::post('/','ContactController@create');
});

Route::get('person','PersonController@index');

//ユーザー側レビューページ
Route::post('review','ReviewController@index');
Route::post('review/add','ReviewController@add');

//ユーザー側マイページ
Route::group(['prefix' => 'mypage'], function () {
    Route::get('/','MyPageController@index')->middleware("auth");
    Route::post('/','MyPageController@del');
    Route::get('/basket','MyPageController@basket')->middleware("auth");
    Route::post('/basket','MyPageController@basketdel');
    Route::get('/buy','MyPageController@buy')->middleware("auth");
    Route::post('/buy','MyPageController@thanks');
    Route::post('/view/del','MyPageController@viewDel');
    Route::get('/chat','MyPageController@chat')->middleware("auth");
    Route::post('/chat','MyPageController@chatpost');
});

//ユーザー側タイムライン
Route::group(['prefix' => 'timeline'], function () {
    Route::get('/','TimelineController@index');
    Route::get('/comment','TimelineController@comment')->middleware("auth");
    Route::post('/comment','TimelineController@commentpost')->middleware("auth");
    Route::get('/good','TimelineController@good');
    Route::get('/bad','TimelineController@bad');
    Route::get('/comment/good','TimelineController@goodcomment');
    Route::get('/comment/bad','TimelineController@badcomment');
});


// 管理者側


//管理者側商品
Route::group(['prefix' => 'admin/product'], function () {
    Route::get('/','IndexController@index')->middleware("auth");
    Route::get('/add','IndexController@add')->middleware("auth");
    Route::post('/add','IndexController@create');
    Route::get('/edit','IndexController@edit')->middleware("auth");
    Route::post('/edit','IndexController@update');
    Route::get('/del','IndexController@del')->middleware("auth");
    Route::post('/del','IndexController@remove');
    Route::get('/detailadd','IndexController@detailaddget')->middleware("auth");
    Route::post('/detailadd','IndexController@detailaddpost');
    Route::get('/sales','IndexController@sales')->middleware("auth");
});

//管理者側運営会社
Route::group(['prefix' => 'admin/company'], function () {
    Route::get('/','CompanyController@index')->middleware("auth");
    Route::get('/add','CompanyController@add')->middleware("auth");
    Route::post('/add','CompanyController@create');
    Route::get('/del','CompanyController@del')->middleware("auth");
    Route::post('/del','CompanyController@remove');
    Route::get('/edit','CompanyController@edit')->middleware("auth");
    Route::post('/edit','CompanyController@update');
});

//管理者側お問い合わせ
Route::group(['prefix' => 'admin/contact'], function () {
    Route::get('/anslist','ContactController@answerlist')->middleware("auth");
    Route::get('/ans','ContactController@ansget')->middleware("auth");
    Route::post('/ans','ContactController@anspost');
});

//管理者側マイページ
Route::group(['prefix' => 'admin/mypage'], function () {
    Route::get('/chatUser','MyPageController@chatUser')->middleware("auth");
    Route::get('/chatAdmin','MyPageController@chatAdmin')->middleware("auth");
    Route::post('/chatAdmin','MyPageController@chatAdminpost')->middleware("auth");
});

//管理者側タイムライン
Route::group(['prefix' => 'admin/timeline'], function () {
    Route::get('/add','TimelineController@add')->middleware("auth");
    Route::post('/add','TimelineController@create');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

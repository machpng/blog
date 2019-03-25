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


Auth::routes();

Route::get('topic', 'TopicsController@create')->name('topics.store');
Route::post('topic/store', 'TopicsController@store');
Route::post('topic/upload_image', 'TopicsController@uploadImage')->name('topics.upload_image');
Route::get('topics/{topic}/{slug?}', 'TopicsController@show')->name('topics.show');

Route::resource('replies', 'RepliesController', ['only' => ['store', 'destroy']]);
// 个人页面
Route::resource('users', 'UsersController', ['only' => ['show', 'update', 'edit']]);


Route::get('single', 'HomeController@single');
Route::get('about', 'HomeController@about')->name('about');
Route::get('/{tags?}', 'HomeController@index')->name('index');

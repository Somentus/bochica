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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/create', 'QuestionController@create')->name('createQuestion');
Route::post('/questions', 'QuestionController@store')->name('storeQuestion');
Route::get('/questions/{question}', 'QuestionController@show')->name('showQuestion');
Route::get('/questions/{question}/edit', 'QuestionController@edit')->name('editQuestion');
Route::patch('/questions/{question}', 'QuestionController@update');
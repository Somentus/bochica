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

Route::get('/questions', 'QuestionController@index')->name('allQuestions');
Route::get('/questions/create', 'QuestionController@create')->name('createQuestion');
Route::post('/questions', 'QuestionController@store');
Route::get('/questions/{question}', 'QuestionController@show');
Route::get('/questions/{question}/edit', 'QuestionController@edit');
Route::patch('/questions/{question}', 'QuestionController@update');
Route::delete('questions/{question}', 'QuestionController@destroy');
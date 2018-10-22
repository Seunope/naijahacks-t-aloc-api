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
Route::resource('flagged', 'FlaggedQuestionController');
Route::get('/load-questions', 'FlaggedQuestionController@loadFlaggedQuestions');

Route::get('/vote-up/{id}', 'VoteController@castUpVote');
Route::get('/vote-down/{id}', 'VoteController@castDownVote');
Route::post('/comment-question', 'CommentController@commentOnQuestion');

Route::get('/search', 'SearchController@index');
Route::post('/search', 'SearchController@searchByFullText');







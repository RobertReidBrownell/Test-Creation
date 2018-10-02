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

Route::get('/', 'ContentsController@home')->name('home');

Route::middleware('auth')->group(function (){
	Route::get('/exams', 'ExamController@index')->name('exams');
	Route::get('/exams/{exam_id}', 'QuestionController@show')->name('show_exam');
//	Route::post('/exams/{exam_id}', 'QuestionController@modify')->name('update_exam');
	Route::get('/exam/{exam_id}', 'ExamController@generateExam')->name('create_exam');
	Route::get('/upload', 'ExamController@upload')->name('upload');
	Route::post('/upload', 'ExamController@upload')->name('upload');
} );
Auth::routes();


//Route::get('/home', 'HomeController@index')->name('home');

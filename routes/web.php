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

Route::middleware(['auth'])->group(function () {


  Route::resource('students', 'StudentsController');
  Route::resource('/', 'StudentsController');
  Route::get('/student_fee/{id}', 'StudentsController@student_fee');
  Route::post('/post_student_fee', 'StudentsController@post_student_fee');
  Route::get('/student_fee_list/{id}', 'StudentsController@student_fee_list');
  Route::get('/student_fee_detail/{id}', 'StudentsController@student_fee_detail');
  Route::get('/student_fee_edit/{id}', 'StudentsController@student_fee_edit');
  Route::post('/post_fee_edit', 'StudentsController@post_fee_edit');
  Route::get('/fee_reciept/{id}', 'StudentsController@fee_reciept');
  Route::get('/student_reciept/{id}', 'StudentsController@student_reciept');
  Route::get('/reciept_list/{id}', 'StudentsController@reciept_list');
  Route::post('/post_reciept_fee', 'StudentsController@post_reciept_fee');
  Route::get('/print_reciept/{id}', 'StudentsController@print_reciept');


  Route::resource('fees', 'FeesController');
  Route::resource('guardians', 'GuardiansController');
});

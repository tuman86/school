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
  Route::get('/reports', 'StudentsController@reports');
  Route::post('/get_reports', 'StudentsController@get_reports');
  Route::get('/my_reports', 'StudentsController@my_reports');
  Route::post('/get_my_reports', 'StudentsController@get_my_reports');

  Route::resource('fees', 'FeesController');
  Route::resource('guardians', 'GuardiansController');
  Route::resource('school_sessions', 'SchoolSessionController');

  Route::get('/update_all_records', 'SchoolSessionController@update_all_records');
  Route::get('/new_session_class/{id}', 'SchoolSessionController@new_session_class');
  Route::post('/update_session_class', 'SchoolSessionController@update_session_class');

});

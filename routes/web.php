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

//Route::resource('/course', 'CourseController');

Route::resource('/student', 'StudentController');
//Route::get('studentedit/{id}','StudentController@edit')->name('studentedit');
//Route::get('/student/create', 'StudentController@create');
//Route::post('/student/store', 'StudentController@store');
//Route::delete('/student/{id}/delete', 'StudentController@destroy');
//Route::post('/student/{id}/edit', 'StudentController@update');
Route::get('/studentedit/{id}', 'StudentController@edit');

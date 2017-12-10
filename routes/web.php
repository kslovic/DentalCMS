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

Route::get('/', 'HomeController@index')->name('home');

Route::post('/addpatient', 'PatientsController@addpatient')->name('addpatient');
Route::post('/editpatient', 'PatientsController@editpatient')->name('editpatient');
Route::post('/deletepatient', 'PatientsController@deletepatient')->name('deletepatient');
Route::get('/addpatientform', 'PatientsController@addpatientform')->name('addpatientform');
Route::get('/editpatientform', 'PatientsController@editpatientform')->name('editpatientform');
Route::get('/showpatient', 'PatientsController@showpatient')->name('showpatient');

Route::post('/addsession', 'SessionsController@addpsession')->name('addsession');
Route::post('/editsession', 'SessionsController@editsession')->name('editsession');
Route::post('/deletesession', 'SessionsController@deletesession')->name('deletesession');
Route::get('/addsessionform', 'SessionsController@addsessionform')->name('addsessionform');
Route::get('/editsessionform', 'SessionsController@editsessionform')->name('editsessionform');
Route::get('/showsession', 'SessionsController@showsession')->name('showsession');

Route::get('/sessionschedule', 'SessionsController@sessionschedule')->name('sessionschedule');
Route::get('/patientlist', 'PatientsController@patientlist')->name('patientlist');
Route::get('/patientprofile', 'PatientsController@patientprofile')->name('patientprofile');
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
Route::get('/settings', 'HomeController@setup')->name('setup');
Route::post('/settingspost', 'HomeController@postsetup')->name('postsetup');

Route::post('/addpatient', 'PatientsController@addpatient')->name('addpatient');
Route::post('/editpatient', 'PatientsController@editpatient')->name('editpatient');
Route::post('/deletepatient', 'PatientsController@deletepatient')->name('deletepatient');
Route::get('/addpatientform', 'PatientsController@addpatientform')->name('addpatientform');
Route::post('/editpatientform', 'PatientsController@editpatientform')->name('editpatientform');

Route::post('/addsession', 'SessionsController@addsession')->name('addsession');
Route::post('/editsession', 'SessionsController@editsession')->name('editsession');
Route::post('/deletesession', 'SessionsController@deletesession')->name('deletesession');
Route::post('/addsessionform', 'SessionsController@addsessionformpost')->name('addsessionformpost');
Route::post('/editsessionform', 'SessionsController@editsessionform')->name('editsessionform');
Route::get('/showsession', 'SessionsController@showsession')->name('showsession');

Route::get('/sessionschedule', 'SessionsController@sessionschedule')->name('sessionschedule');
Route::post('/sessionschedule', 'SessionsController@sessionschedulepost')->name('sessionschedulepost');
Route::get('/patientlist', 'PatientsController@patientlist')->name('patientlist');
Route::post('/patientlist', 'PatientsController@patientlistpost')->name('patientlistpost');
Route::post('/patientprofile', 'PatientsController@patientprofile')->name('patientprofile');
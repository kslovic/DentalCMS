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

Route::post('/addpatient', 'PatientsController@addpatient')->name('addpatient');
Route::post('/editpatient', 'PatientsController@editpatient')->name('editpatient');
Route::post('/deletepatient', 'PatientsController@deletepatient')->name('deletepatient');
Route::get('/addpatientform', 'PatientsController@addpatientfrom')->name('addpatientfrom');
Route::get('/editpatientform', 'PatientsController@editpatientfrom')->name('editpatientfrom');
Route::get('/showpatient', 'PatientsController@showpatient')->name('showpatient');

Route::post('/addsession', 'SessionsController@addpsession')->name('addsession');
Route::post('/editsession', 'SessionsController@editsession')->name('editsession');
Route::post('/deletesession', 'SessionsController@deletesession')->name('deletesession');
Route::get('/addsessionform', 'SessionsController@addsessionfrom')->name('addsessionfrom');
Route::get('/editsessionform', 'SessionsController@editsessionfrom')->name('editsessionfrom');
Route::get('/showsession', 'SessionsController@showsession')->name('showsession');
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

Route::get('/home', 'HomeController@index');

Route::resource('/cvs', 'CvController');

Route::resource('/educations', 'EducationController');

Route::resource('/languages', 'LanguageController');

Route::post('/cvs/{cv}/upload-image', 'CvController@uploadImage')->name('cvs.upload-image');

Route::get('/cvs/{cv}/download-pdf', 'CvController@downloadPDF')->name('cvs.download-pdf');
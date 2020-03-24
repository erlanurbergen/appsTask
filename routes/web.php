<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'StudentController@index')->name('home');

Route::get('/create', 'StudentController@create')->name('create');

Route::post('/create', 'StudentController@store')->name('store');
Route::get('/edit/{id}', 'StudentController@edit')->name('edit');
Route::post('/update/{id}', 'StudentController@update')->name('update');


Route::delete('/delete/{id}', 'StudentController@delete')->name('delete');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

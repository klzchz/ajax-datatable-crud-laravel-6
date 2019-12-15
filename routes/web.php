<?php


Route::resource('users','UserController');
Route::post('/users/update/','UserController@update')->name('update.users');
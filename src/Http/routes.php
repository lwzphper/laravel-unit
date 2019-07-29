<?php
Route::get('/','MyUnitController@index');
Route::post('/','MyUnitController@store')->name('test.store');
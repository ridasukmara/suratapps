<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where all API routes are defined.
|
*/





Route::get('admin/pegawais', 'Admin\PegawaiAPIController@index');
Route::post('admin/pegawais', 'Admin\PegawaiAPIController@store');
Route::get('admin/pegawais/{pegawais}', 'Admin\PegawaiAPIController@show');
Route::put('admin/pegawais/{pegawais}', 'Admin\PegawaiAPIController@update');
Route::patch('admin/pegawais/{pegawais}', 'Admin\PegawaiAPIController@update');
Route::delete('admin/pegawais{pegawais}', 'Admin\PegawaiAPIController@destroy');
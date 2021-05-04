<?php

Route::get('listarUsuarios','App\Http\Controllers\ApiUserController@listarUsuarios');
Route::post('registarUsuario','App\Http\Controllers\ApiUserController@registarUsuario');
Route::post('mudarStatus/{id}','App\Http\Controllers\ApiUserController@mudarStatus');


<?php

Route::get('listarUsuarios','App\Http\Controllers\ApiUserController@listarUsuarios');
Route::get('filtrarPorNome/{nome}','App\Http\Controllers\ApiUserController@filtrarPorNome');
Route::post('registarUsuario','App\Http\Controllers\ApiUserController@registarUsuario');
Route::post('mudarStatus/{id}','App\Http\Controllers\ApiUserController@mudarStatus');


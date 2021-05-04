<?php

use Illuminate\Support\Facades\Route;

Route::get('/{nome}/registar', function () {
    return view('welcome');
});

Route::post('/registar', 'App\Http\Controllers\UserController@registarUsuario')->name('registarUsuario');
Route::get('/{nome}/validar', 'App\Http\Controllers\AdminController@listarUsuarios')->name('listarUsuarios');
Route::post('/mudarStatus/{id}', 'App\Http\Controllers\AdminController@mudarStatus')->name('mudarStatus');

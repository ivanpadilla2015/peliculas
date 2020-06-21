<?php

use Illuminate\Support\Facades\Route;



Route::get('/p', function () {
    return view('welcome');
});

//Route::view('/', 'index');
Route::resource('equipos', 'EquipoController');
Route::view('verequipo', 'show');
Route::view('modelos', 'modelos');
Route::view('marcas', 'marcas');
Route::view('tipos', 'tipoequipos');

Route::get('pdfg', 'PdfController@Pdfgeneral');
Route::get('xuser','PdfController@consulxuser');
Route::get('xusuario', 'PdfController@Pdfxusuario')->name('xusuario');
Route::get('gengrupodepen', 'PdfController@Pdfgrupodepen');

Route::get('tgrupouser', 'PdfController@Pdfgrupoxuser');
Route::get('tgrupousern', 'PdfController@Pdfgrupoxusern');

Route::resource('personal', 'PersonalController');
Route::get('/dasativaus/{id}', 'PersonalController@desactivarusuario');

Route::resource('dependen', 'DependenController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


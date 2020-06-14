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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


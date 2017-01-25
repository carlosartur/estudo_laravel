<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contas', 'ContasPagarController@listar');
Route::get('/contas/cadastrar', 'ContasPagarController@cadastrar');
Route::get('/contas/editar/{id}', 'ContasPagarController@editar');
Route::get('/contas/apagar/{id}', 'ContasPagarController@apagar');



Route::post('/contas/salvar', 'ContasPagarController@salvar');
Route::post('/contas/update/{id}', 'ContasPagarController@update');


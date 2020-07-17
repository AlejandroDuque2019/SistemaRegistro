<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('registro/{accion}', 'HomeController@registro');

Route::get('registroAsistencia/', 'HomeController@proceso');

/*Reportes*/
//Individual
Route::get('reporteRegistroIndividual/{id}','HomeController@detalle');
//General
Route::get('reporteRegistroGeneral','HomeController@general');
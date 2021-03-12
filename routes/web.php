<?php

use Illuminate\Support\Facades\Route;
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

//empieza base

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//end Base

//casillas

Route::get('/casillas', 'casillasController@index')->name('casillas.index');

Route::get('/makeCasilla', 'casillasController@create')->name('casillas.create');

Route::post('/casillas', 'casillasController@store')->name('casillas.store');

Route::get('/casillas/{id_casilla}', 'casillasController@show')->name('casillas.show');

Route::get('/casillas/{casillas}/editcasillas', 'casillasController@edit')->name('casillas.edit');

Route::patch('/casillas/{casillas}', 'casillasController@update')->name('casillas.update');

Route::delete('/casillas/{casillas}', 'casillasController@destroy')->name('casillas.destroy');

//end casillas

// votos

Route::get('/makeVoto', 'votosController@create')->name('votos.create');

Route::post('/votos', 'votosController@store')->name('votos.store');

Route::get('/graph', 'votosController@graficas')->name('votos.grafica');

Route::get('/graphs', 'votosController@index')->name('votos.graph');

//end votos

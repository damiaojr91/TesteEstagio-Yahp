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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function() {return view('home');})->name('home');

Route::get('/funcionarios', 'App\\Http\\Controllers\\FuncionariosController@index')->name('indexFuncionarios');
Route::get('/funcionarios/criacao', 'App\\Http\\Controllers\\FuncionariosController@create')->name('createFuncionario');
Route::post('/funcionarios/criacao', 'App\\Http\\Controllers\\FuncionariosController@store')->name('storeFuncionario');
Route::get('/funcionarios/visualizar/{id}', 'App\\Http\\Controllers\\FuncionariosController@show')->name('showFuncionario');
Route::get('/funcionarios/edicao/{id}', 'App\\Http\\Controllers\\FuncionariosController@edit')->name('editFuncionario');
Route::patch('/funcionarios/{id}', 'App\\Http\\Controllers\\FuncionariosController@update')->name('updateFuncionario');
Route::delete('/funcionarios/delecao/{id}', 'App\\Http\\Controllers\\FuncionariosController@destroy')->name('deleteFuncionario');

Route::get('/investimentos', 'App\\Http\\Controllers\\InvestimentosController@index')->name('indexInvestimentos');

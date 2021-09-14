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

// Route::get('/', function() {return view('home');})->name('home');
Route::get('/', 'App\\Http\\Controllers\\HomeController@index')->name('home');

Route::get('/funcionarios', 'App\\Http\\Controllers\\FuncionariosController@index')->name('indexFuncionarios');
Route::get('/funcionarios/criacao', 'App\\Http\\Controllers\\FuncionariosController@create')->name('createFuncionario');
Route::post('/funcionarios/criacao', 'App\\Http\\Controllers\\FuncionariosController@store')->name('storeFuncionario');
Route::get('/funcionarios/{id}/visualizar', 'App\\Http\\Controllers\\FuncionariosController@show')->name('showFuncionario');
Route::get('/funcionarios/{id}/edicao', 'App\\Http\\Controllers\\FuncionariosController@edit')->name('editFuncionario');
Route::patch('/funcionarios/{id}', 'App\\Http\\Controllers\\FuncionariosController@update')->name('updateFuncionario');
Route::delete('/funcionarios/{id}/delecao/', 'App\\Http\\Controllers\\FuncionariosController@destroy')->name('deleteFuncionario');

Route::get('/investimentos', 'App\\Http\\Controllers\\InvestimentosController@index')->name('indexInvestimentos');
Route::get('/investimentos/criacao', 'App\\Http\\Controllers\\InvestimentosController@create')->name('createInvestimento');
Route::post('/investimentos/criacao', 'App\\Http\\Controllers\\InvestimentosController@store')->name('storeInvestimento');
Route::get('/investimentos/{id}/visualizar', 'App\\Http\\Controllers\\InvestimentosController@show')->name('showInvestimento');
Route::get('/investimentos/{id}/edicao', 'App\\Http\\Controllers\\InvestimentosController@edit')->name('editInvestimento');
Route::patch('/investimentos/{id}', 'App\\Http\\Controllers\\InvestimentosController@update')->name('updateInvestimento');
Route::delete('/investimentos/{id}/delecao', 'App\\Http\\Controllers\\InvestimentosController@destroy')->name('deleteInvestimento');

Route::get('/funcionarios/{id}/investimentos', 'App\\Http\\Controllers\\FuncionarioInvestimentosController@index')->name('indexFuncionarioInvestimentos');
Route::get('/funcionarios/{id}/investimento/criar', 'App\\Http\\Controllers\\FuncionarioInvestimentosController@create')->name('createFuncionarioInvestimentos');
Route::post('/funcionarios/{id}/investimento', 'App\\Http\\Controllers\\FuncionarioInvestimentosController@store')->name('storeFuncionarioInvestimentos');
Route::get('/funcionarios/{id}/investimento/{investimento_id}/edicao', 'App\\Http\\Controllers\\FuncionarioInvestimentosController@edit')->name('editFuncionarioInvestimentos');
Route::patch('/funcionarios/{id}/investimento/{investimento_id}/', 'App\\Http\\Controllers\\FuncionarioInvestimentosController@update')->name('updateFuncionarioInvestimentos');
Route::delete('/funcionarios/{id}/investimento/{investimento_id}', 'App\\Http\\Controllers\\FuncionarioInvestimentosController@destroy')->name('deleteFuncionarioInvestimentos');

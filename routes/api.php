<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/importafuncionario','App\\Http\\Controllers\\HomeController@importaFuncionario')->name('importaFuncionarios');
// Route::post('/importafuncionario','App\\Http\\Controllers\\HomeController@importaFuncionario')->name('importaFuncionarios');

// Route::get('/importafuncionario', function(){
//     $response = Http::get('https://reqres.in/api/users?page=1');

//     dd($response->json());
// }, 'App\\Http\\Controllers\\HomeController@importaFuncionario')->name('importaFuncionarios');

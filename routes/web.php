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
    return view('teste');
});

Route::get('/produto/{id?}', ['alias' => '/produto' , 'uses' => 'ProdutoController@getProdutos']);
Route::post('/produto', ['alias' => '/produto' , 'uses' => 'ProdutoController@storeProduto']);
Route::post('/produto/update/{id}', ['alias' => '/produto' , 'uses' => 'ProdutoController@storeProduto']);
Route::post('/produto/filtro', ['alias' => '/produto' , 'uses' => 'ProdutoController@getProdutosByFiltro']);
Route::delete('/produto/{id}', ['alias' => '/produto' , 'uses' => 'ProdutoController@deleteProduto']);

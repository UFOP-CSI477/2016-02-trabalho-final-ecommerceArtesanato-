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

Route::get('/', ['as' => 'index', 'uses' => 'HomeController@index']);

Auth::routes();

Route::group(['prefix' => 'carrinho'], function (){
    Route::get('/', ['as' => 'carrinho.visualizar', 'uses' => 'CarrinhoController@visualizar']);
    Route::post('adicionar', ['as' => 'carrinho.adicionar', 'uses' => 'CarrinhoController@adicionarProduto']);
    Route::get('remover/{itemId}', ['as' => 'carrinho.remover', 'uses' => 'CarrinhoController@removerProduto']);
    Route::get('limpar', ['as' => 'carrinho.limpar', 'uses' => 'CarrinhoController@limpar']);
});

Route::group(['middleware' => 'auth'], function (){
    Route::get('/painel', ['as' => 'painel', 'uses' => 'HomeController@painel']);

    Route::get('carrinho/finalizar', ['as' => 'carrinho.finalizar', 'uses' => 'CarrinhoController@finalizar']);

    Route::get('compras', ['as' => 'usuario.compras', 'uses' => 'CompraController@comprasUsuario']);
    Route::get('compras/{compraId}/detalhes', ['as' => 'usuario.compras.detalhe', 'uses' => 'CompraController@compraUsuarioDetalhes']);

    Route::get('dados', ['as' => 'usuario.ver.dados', 'uses' => 'UsuarioController@verDados']);
    Route::patch('dados/{usuario}', ['as' => 'usuario.alterar.dados', 'uses' => 'UsuarioController@update']);

    Route::group(['middleware' => 'can:administrar'], function (){
        Route::resource('compra', 'CompraController');
        Route::resource('produto', 'ProdutoController', ['except' => 'show']);
        Route::resource('tipoproduto', 'TipoProdutoController', ['except' => 'show']);
        Route::resource('usuario', 'UsuarioController', ['except' => ['create', 'store']]);
        Route::resource('transacao', 'TransacaoController', ['except' => ['create', 'store']]);
    });
});

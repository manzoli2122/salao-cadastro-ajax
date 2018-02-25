<?php
use Illuminate\Support\Facades\Route;

    Route::group(['prefix' => 'cadastroAjax', 'middleware' => 'auth' ], function(){

        // OPERADORAS
        Route::get('operadorasAjax/apagados/{id}', 'OperadoraController@showApagado')->name('operadorasAjax.showapagado');     
        Route::get('operadorasAjax/apagados', 'OperadoraController@indexApagados')->name('operadorasAjax.apagados');        
        Route::delete('operadorasAjax/apagados/{id}', 'OperadoraController@destroySoft')->name('operadorasAjax.destroySoft');
        Route::get('operadorasAjax/restore/{id}', 'OperadoraController@restore')->name('operadorasAjax.restore');        
        Route::post('operadorasAjax/getDatatable/apagados', 'OperadoraController@getDatatableApagados')->name('operadorasAjax.getDatatable.apagados');        
        Route::post('operadorasAjax/getDatatable', 'OperadoraController@getDatatable')->name('operadorasAjax.getDatatable');        
        Route::resource('operadorasAjax', 'OperadoraController'); 



        // SERVIÇOS
        Route::get('servicosAjax/apagados/{id}', 'ServicoController@showApagado')->name('servicosAjax.showapagado');        
        Route::get('servicosAjax/apagados', 'ServicoController@indexApagados')->name('servicosAjax.apagados');
        Route::delete('servicosAjax/apagados/{id}', 'ServicoController@destroySoft')->name('servicosAjax.destroySoft');
        Route::get('servicosAjax/restore/{id}', 'ServicoController@restore')->name('servicosAjax.restore');
        Route::post('servicosAjax/getDatatable/apagados', 'ServicoController@getDatatableApagados')->name('servicosAjax.getDatatable.apagados');        
        Route::post('servicosAjax/getDatatable', 'ServicoController@getDatatable')->name('servicosAjax.getDatatable');        
        Route::resource('servicosAjax', 'ServicoController');



        // PRODUTOS
        //Route::get('produtosAjax/apagados/{id}', 'ProdutoController@showApagado')->name('produtosAjax.showapagado');        
        //Route::get('produtosAjax/apagados', 'ProdutoController@indexApagados')->name('produtosAjax.apagados');
        //Route::delete('produtosAjax/apagados/{id}', 'ProdutoController@destroySoft')->name('produtosAjax.destroySoft');
        //Route::get('produtosAjax/restore/{id}', 'ProdutoController@restore')->name('produtosAjax.restore');
        //Route::post('produtosAjax/getDatatable/apagados', 'ProdutoController@getDatatableApagados')->name('produtosAjax.getDatatable.apagados');        
        Route::post('produtosAjax/getDatatable', 'ProdutoController@getDatatable')->name('produtosAjax.getDatatable');        
        Route::resource('produtosAjax', 'ProdutoController'); 
  


    });
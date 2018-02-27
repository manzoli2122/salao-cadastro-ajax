<?php
use Illuminate\Support\Facades\Route;

    Route::group(['prefix' => 'cadastro/ajax', 'middleware' => 'auth' ], function(){

        // OPERADORAS
        Route::post('operadoras/getDatatable', 'OperadoraController@getDatatable')->name('operadorasAjax.getDatatable');        
        Route::resource('operadoras', 'OperadoraController' , ['names' => [
            'create' => 'operadorasAjax.create' ,
            'index' => 'operadorasAjax.index' ,
            'edit' => 'operadorasAjax.edit' ,
            'update' => 'operadorasAjax.update' ,
            'store' => 'operadorasAjax.store' ,
            'show' => 'operadorasAjax.show' ,
            'destroy' => 'operadorasAjax.destroy' ,
        ]]); 

        //Route::get('operadorasAjax/apagados/{id}', 'OperadoraController@showApagado')->name('operadorasAjax.showapagado');     
        //Route::get('operadorasAjax/apagados', 'OperadoraController@indexApagados')->name('operadorasAjax.apagados');        
        //Route::delete('operadorasAjax/apagados/{id}', 'OperadoraController@destroySoft')->name('operadorasAjax.destroySoft');
        //Route::get('operadorasAjax/restore/{id}', 'OperadoraController@restore')->name('operadorasAjax.restore');        
        //Route::post('operadorasAjax/getDatatable/apagados', 'OperadoraController@getDatatableApagados')->name('operadorasAjax.getDatatable.apagados');        
        



        // SERVIÇOS
        Route::post('servicos/getDatatable', 'ServicoController@getDatatable')->name('servicosAjax.getDatatable');        
        Route::resource('servicos', 'ServicoController' , ['names' => [
            'create' => 'servicosAjax.create' ,
            'index' => 'servicosAjax.index' ,
            'edit' => 'servicosAjax.edit' ,
            'update' => 'servicosAjax.update' ,
            'store' => 'servicosAjax.store' ,
            'show' => 'servicosAjax.show' ,
            'destroy' => 'servicosAjax.destroy' ,
        ]]);

        //Route::get('servicosAjax/apagados/{id}', 'ServicoController@showApagado')->name('servicosAjax.showapagado');        
        //Route::get('servicosAjax/apagados', 'ServicoController@indexApagados')->name('servicosAjax.apagados');
        //Route::delete('servicosAjax/apagados/{id}', 'ServicoController@destroySoft')->name('servicosAjax.destroySoft');
        //Route::get('servicosAjax/restore/{id}', 'ServicoController@restore')->name('servicosAjax.restore');
        //Route::post('servicosAjax/getDatatable/apagados', 'ServicoController@getDatatableApagados')->name('servicosAjax.getDatatable.apagados');        
        


        
        // PRODUTOS
        Route::post('produtos/getDatatable', 'ProdutoController@getDatatable')->name('produtosAjax.getDatatable');        
        Route::resource('produtos', 'ProdutoController', ['names' => [
            'create' => 'produtosAjax.create' ,
            'index' => 'produtosAjax.index' ,
            'edit' => 'produtosAjax.edit' ,
            'update' => 'produtosAjax.update' ,
            'store' => 'produtosAjax.store' ,
            'show' => 'produtosAjax.show' ,
            'destroy' => 'produtosAjax.destroy' ,
        ]]); 
  
        //Route::get('produtosAjax/apagados/{id}', 'ProdutoController@showApagado')->name('produtosAjax.showapagado');        
        //Route::get('produtosAjax/apagados', 'ProdutoController@indexApagados')->name('produtosAjax.apagados');
        //Route::delete('produtosAjax/apagados/{id}', 'ProdutoController@destroySoft')->name('produtosAjax.destroySoft');
        //Route::get('produtosAjax/restore/{id}', 'ProdutoController@restore')->name('produtosAjax.restore');
        //Route::post('produtosAjax/getDatatable/apagados', 'ProdutoController@getDatatableApagados')->name('produtosAjax.getDatatable.apagados');        
        




        //----------------------------------------------------------------------------------------------------------------------
        //  APAGADOS
        //----------------------------------------------------------------------------------------------------------------------




        Route::group(['prefix' => 'apagados', 'middleware' => 'auth' ], function(){
            
            
            // OPERADORAS
            Route::post('operadoras/restore/{id}', 'OperadoraSoftDeleteController@restore')->name('apagadosOperadorasAjax.restore');        
            Route::post('operadoras/getDatatable', 'OperadoraSoftDeleteController@getDatatable')->name('apagadosOperadorasAjax.getDatatable');        
            Route::resource('operadoras', 'OperadoraSoftDeleteController', ['only' => [
                    'index', 'show' , 'destroy'
                ] ,
                'names' => [                
                    'index' => 'apagadosOperadorasAjax.index' ,   
                    'show' => 'apagadosOperadorasAjax.show' ,
                    'destroy' => 'apagadosOperadorasAjax.destroy' ,
                ]
            ]); 






            // PRODUTOS
            Route::post('produtos/restore/{id}', 'ProdutoSoftDeleteController@restore')->name('produtos.ajax.apagados.restore');        
            Route::post('produtos/getDatatable', 'ProdutoSoftDeleteController@getDatatable')->name('produtos.ajax.apagados.getDatatable');        
            Route::resource('produtos', 'ProdutoSoftDeleteController', ['only' => [
                    'index', 'show' , 'destroy'
                ] ,
                'names' => [                
                    'index' => 'produtos.ajax.apagados.index' ,   
                    'show' => 'produtos.ajax.apagados.show' ,
                    'destroy' => 'produtos.ajax.apagados.destroy' ,
                ]
            ]); 



        });

    });
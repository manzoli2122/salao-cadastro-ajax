<?php

namespace Manzoli2122\Salao\Cadastro\Ajax\Http\Controllers;

use Manzoli2122\Salao\Cadastro\Models\Operadora;
use Manzoli2122\Salao\Cadastro\Mail\OperadoraMail;
//use Manzoli2122\Salao\Cadastro\Http\Controllers\Padroes\SoftDeleteController ;
use Manzoli2122\Pacotes\Http\Controller\DataTable\Json\SoftDeleteJsonController ;

class OperadoraController extends SoftDeleteJsonController
{
  
    protected $model;
    protected $logCannel;
    protected $name = "Operadora";
    protected $view = "cadastroAjax::operadoras";
    protected $view_apagados = "cadastroAjax::operadoras.apagados";
    protected $route = "operadorasAjax";



    public function __construct(Operadora $operadora){
        $this->model = $operadora;
        $this->middleware('auth');

        //$this->logCannel = 'cadastro';

       // $this->middleware('permissao:operadoras')->only([ 'index' , 'show' ]) ;        
       // $this->middleware('permissao:operadoras-cadastrar')->only([ 'create' , 'store']);
       // $this->middleware('permissao:operadoras-editar')->only([ 'edit' , 'update']);
       // $this->middleware('permissao:operadoras-soft-delete')->only([ 'destroySoft' ]);
        //$this->middleware('permissao:operadoras-restore')->only([ 'restore' ]);        
        //$this->middleware('permissao:operadoras-admin-permanete-delete')->only([ 'destroy' ]);
        //$this->middleware('permissao:operadoras-apagados')->only([ 'indexApagados' , 'showApagado']) ;
        
    }   


}

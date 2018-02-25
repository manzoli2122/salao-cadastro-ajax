    <section class="content-header">
        <h1>
            <span id="div-titulo-pagina">
                Adicionar Operadora
            </span>
            <small id="div-small-content-header" ></small>
            <small style="float: right;">    </small>
        </h1>
    </section>            
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-success" id="div-box">
                    <form method="post" action="{{route('operadorasAjax.store')}}" id="form-model">            
                        {{csrf_field()}}
                        @include('cadastroAjax::operadoras._form', ['model' => new Manzoli2122\Salao\Cadastro\Ajax\Models\Operadora() ])
                    </form>
    
                    <div class="box-footer align-right">
                        <button type="button" class="btn btn-default"  onclick="modelVoltarIndex()" > <i class="fa fa-reply"></i> Voltar </button>
                        <button class="btn btn-success" onclick="modelStore( '{{ route('operadorasAjax.store') }}' , null  )" ><i class="fa fa-check"></i> Salvar</button> 
                    </div>
    
                </div>
            </div>
        </div>
    </section>
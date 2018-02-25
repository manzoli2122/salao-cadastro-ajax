    <section class="content-header">
        <h1>
            <span id="div-titulo-pagina">
                Editar Produto
            </span>
            <small id="div-small-content-header" ></small>
            <small style="float: right;">    </small>
        </h1>
    </section>
            
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-success" id="div-box"> 

                    <form method="post" action="{{route('produtos.update', $model->id)}}" id="form-produto">            
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="PATCH">
                        @include('cadastro::produtos._form', ['model' => $model])                        
                    </form>
                    <div class="box-footer align-right">
                        
                        <button data-id="{{$model->id}}"  class="btn btn-success" onclick="modelUpdate(this.dataset.id)" ><i class="fa fa-check"></i> Salvar Ajax</button>
                        
                        



                        <a class="btn btn-default" href="{{ route('produtos.index') }}">
                            <i class="fa fa-reply"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Salvar</button>
                    </div>

                    

                        
                    



                </div>
            </div>
        </div>
    </section>
            
        
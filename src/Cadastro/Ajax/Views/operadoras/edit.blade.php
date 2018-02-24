
        <form method="post" action="{{route('operadorasAjax.update', $model->id)}}" id="form-operadora" >            
            {{csrf_field()}}
            <input name="_method" type="hidden" value="PATCH">
            @include('cadastroAjax::operadoras._form', ['model' => $model])
            
        </form>

        <div class="box-footer align-right">
            <a class="btn btn-default" href="{{ route('operadorasAjax.index') }}"><i class="fa fa-reply"></i> Cancelar</a>
            
            <button data-id="{{$model->id}}"  class="btn btn-success" onclick="userUpdate(this.dataset.id)" ><i class="fa fa-check"></i> Salvar Ajax</button>
            
            <!--button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Salvar</button-->
        </div>
        
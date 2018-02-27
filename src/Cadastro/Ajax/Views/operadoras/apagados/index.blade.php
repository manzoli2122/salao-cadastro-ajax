@extends( Config::get('app.templateMasterJson' , 'templates.templateMasterJson')  )

@section( Config::get('app.templateMasterContent' , 'content')  )
<section class="content-header">
	<h1>
		<span id="div-titulo-pagina">
			Listagem dos Operadoras	Apagadas	
		</span>
		<small id="div-small-content-header" ></small>
		<small style="float: right;">		</small>
	</h1>
</section>	
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-success" id="div-box"> 
				<?php echo $dataTable; ?>      
			</div>
		</div>
	</div>
</section>
@endsection




@push(Config::get('app.templateMasterScript' , 'script') )
	<script src="{{ mix('js/datatables-padrao.js') }}" type="text/javascript"></script>

	<script>

		var pagianIndex = document.getElementById("div-pagina").innerHTML;		
		function modelIndexDataTableFunction() {
			var dataTable = datatablePadrao('#datatable', {
				order: [[ 1, "asc" ]],
				ajax: { 
					url:'{{ route('apagadosOperadorasAjax.getDatatable') }}'
				},
				columns: [
					{ data: 'id', name: 'id' },
					{ data: 'nome', name: 'nome' },
					{ data: 'porcentagem_credito', name: 'porcentagem_credito' },
					{ data: 'porcentagem_credito_parcelado', name: 'porcentagem_credito_parcelado' },
					{ data: 'porcentagem_debito', name: 'porcentagem_debito' },
					{ data: 'max_parcelas', name: 'max_parcelas' },					
					{ data: 'action', name: 'action', orderable: false, searchable: false, class: 'align-center'}
				],
			});
	
			dataTable.on('draw', function () {
				$('[btn-excluir]').click(function (){
					excluirRecursoPeloId($(this).data('id'), "@lang('msg.conf_excluir_o', ['1' => 'Operadoras' ])", "{{ route('apagadosOperadorasAjax.index') }}", 
						function(){
							dataTable.row( $(this).parents('tr') ).remove().draw('page');
						}
					);
				});

				$('[btn-show]').click(function (){					
					modelShow($(this).data('id'), "{{ route('apagadosOperadorasAjax.index') }}",
						function(data){							
							document.getElementById("div-pagina").innerHTML = data ;						
						}
					);                 
				});

				$('[btn-restaurar]').click(function (){					
					modelRestaurar($(this).data('id'), "{{ route('apagadosOperadorasAjax.index') }}",
						function(){							
							dataTable.row( $(this).parents('tr') ).remove().draw('page');					
						} 	
					);                 
				});

			});

		}


		$(document).ready(function() {
			modelIndexDataTableFunction();
		});
	</script>



@endpush

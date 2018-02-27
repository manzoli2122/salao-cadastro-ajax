@extends( Config::get('app.templateMasterJson' , 'templates.templateMasterJson')  )

@push('styles') 
<style>
	.content-wrapper {		
		background-color:#ffc9c9;
	}
	.box , .box-footer{		
		background: #fee;
	}
</style>
@endpush

@section( Config::get('app.templateMasterContent' , 'content')  )

<section class="content-header">
	<h1>
		<span id="div-titulo-pagina">
			Listagem dos Produtos Apagadas	
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
					url:'{{ route('produtos.ajax.apagados.getDatatable') }}'
				},
				columns: [
					{ data: 'id', name: 'id' },
					{ data: 'nome', name: 'nome' },
					{ data: 'valor', name: 'valor' },					
					{ data: 'observacoes', name: 'observacoes' },
					{ data: 'desconto_maximo', name: 'desconto_maximo' },					
					{ data: 'action', name: 'action', orderable: false, searchable: false, class: 'align-center'}
				],
			});
	
			dataTable.on('draw', function () {
				$('[btn-excluir]').click(function (){
					excluirRecursoPeloId($(this).data('id'), "@lang('msg.conf_excluir_o', ['1' => 'Produtos' ])", "{{ route('produtos.ajax.apagados.index') }}", 
						function(){
							dataTable.row( $(this).parents('tr') ).remove().draw('page');
						}
					);
				});

				$('[btn-show]').click(function (){					
					modelShow($(this).data('id'), "{{ route('produtos.ajax.apagados.index') }}",
						function(data){							
							document.getElementById("div-pagina").innerHTML = data ;						
						}
					);                 
				});

				$('[btn-restaurar]').click(function (){					
					modelRestaurar($(this).data('id'), "{{ route('produtos.ajax.apagados.index') }}",
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

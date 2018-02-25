@extends( Config::get('app.templateMasterJson' , 'templates.templateMasterJson')  )

@section( Config::get('app.templateMasterContent' , 'content')  )
<section class="content-header">
	<h1>
		<span id="div-titulo-pagina">
			Listagem dos Produtos
		</span>
		<small id="div-small-content-header" ></small>
		<small style="float: right;">
			@permissao('produtos-cadastrar')
				<button class="btn btn-success btn-sm" onclick="modelCreate( '{{ route('produtosAjax.create') }}')" title="Adicionar um novo Produto">
					<i class="fa fa-plus"></i> Cadastrar Produto 
				</button> 				
			@endpermissao	
		</small>
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
					url:'{{ route('produtosAjax.getDatatable') }}'
				},
				columns: [
					{ data: 'id', name: 'id' },
					{ data: 'nome', name: 'nome' },
					{ data: 'valor', name: 'valor' },					
					{ data: 'observacoes', name: 'observacoes' },
					{ data: 'desconto_maximo', name: 'desconto_maximo',  visible: false },					
					{ data: 'action', name: 'action', orderable: false, searchable: false, class: 'align-center'}
				],
			});

			dataTable.on('draw', function () {
				
				$('[btn-excluir]').click(function (){
					excluirRecursoPeloId($(this).data('id'), "@lang('msg.conf_excluir_o', ['1' => 'produtos'])", "{{ route('produtosAjax.index') }}", 
						function(){
							dataTable.row( $(this).parents('tr') ).remove().draw('page');
						}
					);
				});

				$('[btn-show]').click(function (){					
					modelShow($(this).data('id'), "{{ route('produtosAjax.index') }}",
						function(data){							
							document.getElementById("div-pagina").innerHTML = data ;						
						}
					);                 
				});

				$('[btn-editar]').click(function (){					
					modelEditar($(this).data('id'), "{{ route('produtosAjax.index') }}"	);                 
				});

			});
		}

		$(document).ready(function() {
			modelIndexDataTableFunction();
		});
	</script>
@endpush
@extends( Config::get('app.templateMaster' , 'templates.templateMaster')  )

@section( Config::get('app.templateMasterContentTitulo' , 'titulo-page')  )
	Listagem dos Operadoras	r		
@endsection




@push( Config::get('app.templateMasterCss' , 'css')  )			
	<style type="text/css">
		.btn-group-sm>.btn, .btn-sm {
			padding: 1px 10px;
			font-size: 15px;		
		} 
		.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
			padding: 5.5px;
		}
	</style>
@endpush



@section( Config::get('app.templateMasterContent' , 'content')  )


<?php 
	$table = '<div class="box-body" style="padding-top: 5px; padding-bottom: 3px;"><table class="table table-bordered table-striped table-hover" id="datatable"><thead>	<tr><th style="max-width:20px">ID</th><th pesquisavel>Nome</th><th>Porc. Credito</th><th>Porc. Cred. Parc.</th><th>Porc. Debito</th><th>Máx. de Parcelas</th><th class="align-center" style="width:120px">Ações</th></tr></thead></table></div>' ;
	$showHead = '<div class="box-body"><div class="alert alert-default alert-dismissible align-center invisivel" id="divAlerta"><label>Excluído</label></div><section class="row text-center dados">';
	$showFooter = '</section></div><div class="box-footer align-right"> <button type="button" class="btn btn-default"  onclick="userVoltar()" remover-apos-excluir > <i class="fa fa-reply"></i> Cancelar </button> ';
	
	?>


<div class="col-xs-12">
    <div class="box box-success" id="div-box">        
        <?php echo $table; ?>
    </div>
</div>

@endsection

@push(Config::get('app.templateMasterScript' , 'script') )
	<script src="{{ mix('js/datatables-padrao.js') }}" type="text/javascript"></script>
	
	
	
    <script>
    	
		window.userShow = function(id, url , funcSucesso = function() {} ) {			
					alertProcessando();
					var token = document.head.querySelector('meta[name="csrf-token"]').content;
					$.ajax({
						url: url + "/" + id,
						type: 'get',
						data: { _token: token },
						success: function(retorno) {
							alertProcessandoHide();
							if (retorno.erro) {
								toastErro(retorno.msg);
							} else {
								toastSucesso(retorno.msg);
								funcSucesso(retorno.data);	
							}
						},
						error: function(erro) {
							alertProcessandoHide();
							toastErro("Ocorreu um erro");
							console.log(erro);
						}
					});				
		}



		window.userVoltar = function( ) {				
			var htmltest = '<div class="box-body" style="padding-top: 5px; padding-bottom: 3px;">';				
			htmltest = htmltest + '</div>';		
			document.getElementById("div-box").innerHTML = '<?php echo $table; ?>' ;
			document.getElementById("div-titulo-pagina").innerHTML = "Clientes" ;
			document.getElementById("div-small-content-header").innerHTML = ""  ;				
			operadoraFunction();
		}

		window.userExcluir = function(id ) {				
			excluirRecursoPeloId( id , "@lang('msg.conf_excluir_o', ['1' => 'operadora'])", "{{ route('operadoras.apagados') }}", 
                function(){
                    $('[remover-apos-excluir]').remove();
                    $('#divAlerta').slideDown();
                }
            );
		}


	</script>
	

	
	
	
	
	
	
	
	
	
	
	
	<script>

		function operadoraFunction() { 
			var dataTable = datatablePadrao('#datatable', {
				order: [[ 0, "asc" ]],
				ajax: { 
					url:'{{ route('operadorasAjax.getDatatable') }}'
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
					excluirRecursoPeloId($(this).data('id'), "@lang('msg.conf_excluir_o', ['1' => 'operadora'])", "{{ route('operadorasAjax.apagados') }}", 
						function(){
							dataTable.row( $(this).parents('tr') ).remove().draw('page');
						}
					);
				});
				$('[btn-show]').click(function (){					
					userShow($(this).data('id'), "{{ route('operadorasAjax.index') }}",
						function(data){


							var htmltest = '<?php echo $showHead; ?>' ;
							
							htmltest = htmltest + '<div class="col-12 col-sm-4 dado"><h4 style="text-align:left;">' + data['porcentagem_credito'] + '% para Credito </h4></div>';
							htmltest = htmltest + '<div class="col-12 col-sm-4 dado"><h4 style="text-align:left;">' + data['porcentagem_credito_parcelado'] + '% para Credito Parcelado </h4></div>';
							htmltest = htmltest + '<div class="col-12 col-sm-4 dado"><h4 style="text-align:left;">' + data['porcentagem_debito'] + '% para Debito </h4></div>';
							htmltest = htmltest + '<div class="col-12 col-sm-4 dado"><h4 style="text-align:left;">  Repasse debito: ' + data['repasse_debito_dias'] + ' dias </h4></div>';
							htmltest = htmltest + '<div class="col-12 col-sm-4 dado"><h4 style="text-align:left;">  Máximo de parcelas: ' + data['max_parcelas'] + '</h4></div>';
							
							htmltest =  htmltest +  '<?php echo $showFooter; ?>' ;
							htmltest =  htmltest + '<button data-id="';
							htmltest =  htmltest + data['id'] + '" type="button" class="btn btn-danger" remover-apos-excluir onclick="userExcluir(this.dataset.id)">	<i class="fa fa-times"></i> Excluir	</button> </div>';

							
							document.getElementById("div-box").innerHTML = htmltest ;
							document.getElementById("div-titulo-pagina").innerHTML = data['nome'] ;
							
						}
					);                 
            	});
			});
		}


		$(document).ready(function() {
			operadoraFunction();
		});


	</script>
@endpush
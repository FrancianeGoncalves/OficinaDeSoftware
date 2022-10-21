(function ($) {
	var url = $("#base_url").val();
	$(document).ready(function() {
		var table = $('#tabela-ingredientes').DataTable({
			lengthChange: false,
			scrollX: false,
			scrollY: false,
			dom: '<"top"<"left-col"B><"center-col"l><"right-col"f>>rtip',
			buttons: [
				{
					className: 'btn btn-warning btnWarning',
					text: '<span class="btn-inner--icon "><i class="fa fa-plus"></i></span>',
					action: function ( e, dt, node, config ) {
						modalAddIngrediente();
					}
				}
			],
			"language": {
				sEmptyTable: "Nenhum ingrediente encontrado",
				sInfo: "Mostrando de _START_ até _END_ de _TOTAL_ registros",
				sInfoEmpty: "Mostrando 0 até 0 de 0 registros",
				sInfoFiltered: "(Filtrados de _MAX_ registros)",
				sInfoPostFix: "",
				sInfoThousands: ".",
				sLengthMenu: "_MENU_ resultados por página",
				sLoadingRecords: "Carregando...",
				sProcessing: "Processando...",
				sZeroRecords: "Nenhum ingrediente encontrado",
				sSearch: "Pesquisar",
				oPaginate: {
					sNext: ">",
					sPrevious: "<",
					sFirst: "Primeiro",
					sLast: "Último"
				},
				oAria: {
					sSortAscending: ": Ordenar colunas de forma ascendente",
					sSortDescending: ": Ordenar colunas de forma descendente"
				},
				buttons: {
					colvis: 'Colunas Visíveis',
					copy: 'Copiar'
				}
			}
		});

		table.buttons().container()
			.appendTo('#datatable-empresas_wrapper .col-md-6:eq(0)');
		$(".paging_simple_numbers").addClass('pagination pagination-primary');
		$(".dataTables_paginate").addClass('pagination pagination-primary');

	});

	function modalAddIngrediente(){
		document.getElementById('editarIngrediente').style.display = "none";
		document.getElementById('saveIngrediente').style.display = "block";
		$('#addIngredienteModal [name="nome_ingrediente"]').val("");
		$('#addIngredienteModal [name="obs_ingrediente"]').val("");
		$('#addIngredienteModal [name="idingrediente"]').val("");
		$('#divNome').removeClass('is-focused');
		$('#divObs').removeClass('is-focused');
		$("#exampleModalLabel").html("Novo Ingrediente");
		$('#addIngredienteModal').modal('show');
	}

	function modalEditarIngrediente(){
		$('td').on('click', 'a.bntEditarIngrediente', function() {
			document.getElementById('editarIngrediente').style.display = "block";
			document.getElementById('saveIngrediente').style.display = "none";
			$('#addIngredienteModal [name="nome_ingrediente"]').val($(this).attr("data-nome"));
			$('#addIngredienteModal [name="obs_ingrediente"]').val($(this).attr("data-obs"));
			$('#addIngredienteModal [name="idingrediente"]').val($(this).attr("data-id"));
			$('#divNome').addClass('is-focused');
			$('#divObs').addClass('is-focused');
			$("#exampleModalLabel").html("Editar Ingrediente");
			$('#addIngredienteModal').modal('show');
		});
	}

	function addIngrediente(){
		$('div.modal-footer').on('click', 'button.saveIngrediente', function() {
			let nome = $("#nome_ingrediente").val();
			let obs = $("#obs_ingrediente").val();
			if(nome == null || nome == "" || nome == undefined){
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Favor digite um nome!'
				});
			}else{
				var form = new FormData();
				form.append('nome', nome);
				form.append('observacao', obs);
				$.ajax({
					url: url+'Ingrediente/salvar',
					data: form,
					cache: false,
					contentType: false,
					processData: false,
					type: 'POST',
					success: function (result, status) {
						let dados = JSON.parse(result);
						if(result.error){
							Swal.fire({
								icon: 'warning',
								title: 'Ocorreu um Problema',
								text: result.error
							});
						}else{
							Swal.fire({
								title: 'Ingrediente salvo!',
								icon: 'success',
								// confirmButtonColor: '#1A73E8',
								confirmButtonText: 'OK'
							}).then((result) => {
								location.reload();
							});
						}
					},
					error: function (xhr, ajaxOptions, thrownError) {
						Swal.fire({
							icon: 'warning',
							title: 'Ocorreu um Problema',
							text: 'Entre em contato com o Suporte para verificar o problema'
						});
					},
				});
			}
		});
	}

	function editarIngrediente(){
		$('div.modal-footer').on('click', 'button.editarIngrediente', function() {
			let nome = $("#nome_ingrediente").val();
			let obs = $("#obs_ingrediente").val();
			let id = $("#idingrediente").val();
			if(nome == null || nome == "" || nome == undefined){
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Favor digite um nome!'
				});
			}else{
				var form = new FormData();
				form.append('nome', nome);
				form.append('observacao', obs);
				form.append('id', id);
				$.ajax({
					url: url+'Ingrediente/editar',
					data: form,
					cache: false,
					contentType: false,
					processData: false,
					type: 'POST',
					success: function (result, status) {
						let dados = JSON.parse(result);
						if(result.error){
							Swal.fire({
								icon: 'warning',
								title: 'Ocorreu um Problema',
								text: result.error
							});
						}else{
							Swal.fire({
								title: 'Ingrediente editado!',
								icon: 'success',
								// confirmButtonColor: '#1A73E8',
								confirmButtonText: 'OK'
							}).then((result) => {
								location.reload();
							});
						}
					},
					error: function (xhr, ajaxOptions, thrownError) {
						Swal.fire({
							icon: 'warning',
							title: 'Ocorreu um Problema',
							text: 'Entre em contato com o Suporte para verificar o problema'
						});
					},
				});
			}
		});
	}

	function apagar(){
		$('td').on('click', 'a#apagarIngrediente', function() {
			let id = $(this).attr("data-id");
			Swal.fire({
				title: 'Tem certeza que deseja deletar este ingrediente?',
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#34c38f',
				cancelButtonColor: '#f46a6a',
				cancelButtonText: 'Não',
				confirmButtonText: 'Sim'
			}).then((result) => {
				if (result.value) {
					var form = new FormData();
					form.append('id', id);
					$.ajax({
						url: url+'Ingrediente/deletar',
						data: form,
						cache: false,
						contentType: false,
						processData: false,
						type: 'POST',
						success: function (result, status) {
							Swal.fire({
								title: 'Ingrediente deletado!',
								icon: 'success',
								confirmButtonText: 'OK'
							}).then((result) => {
								location.reload();
							});
						},
						error: function (xhr, ajaxOptions, thrownError) {
							Swal.fire({
								icon: 'warning',
								title: 'Ocorreu um Problema',
								text: 'Entre em contato com o Suporte para verificar o problema'
							});
						},
					});
				}
			});
		});
	}

	function init(){
		addIngrediente();
		editarIngrediente();
		apagar();
		modalEditarIngrediente();
	}

	init();

})(jQuery)

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
		$('.select_ingredientes').select2({ width: '100%' });

	});

	/**
	 *
	 */
	function modalAddIngrediente(){
		$('#addIngredienteModal [name="medida"]').val("");
		$('#divMedida').removeClass('is-focused');
		$('#addIngredienteModal').modal('show');
	}

	/**
	 *
	 */
	function vincularIngrediente(){
		$('div.modal-footer').on('click', 'button.vincularIngrediente', function() {
			let medida = $("#medida").val();
			let ingrediente = $(".select_ingredientes").val();
			let receita = $("#idReceita").val();
			var form = new FormData();
			form.append('medida', medida);
			form.append('ingrediente', ingrediente);
			form.append('receita', receita);
			let error = verificarForm(form);
			if(error){
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Preencha Todos os Campos!'
				});
			}else{
				$.ajax({
					url: url+'Receita/vincularIngrediente',
					data: form,
					cache: false,
					contentType: false,
					processData: false,
					type: 'POST',
					success: function (result, status) {
						let dados = JSON.parse(result);
						if(dados.error){
							Swal.fire({
								icon: 'warning',
								title: 'Ocorreu um Problema',
								text: dados.error
							});
						}else if(dados.update){
							Swal.fire({
								title: 'Vinculo de Ingrediente Atualizado!',
								icon: 'success',
								// confirmButtonColor: '#1A73E8',
								confirmButtonText: 'OK'
							}).then((result) => {
								location.reload();
							});
						}else{
							Swal.fire({
								title: 'Ingrediente Vinculado!',
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

	/**
	 *
	 */
	function modalAddNovoIngrediente(){
		$('div.modal-footer').on('click', 'button.modalAddNovoIngrediente', function() {
			$('#addNovoIngredienteModal [name="nome_ingrediente"]').val("");
			$('#addNovoIngredienteModal [name="obs_ingrediente"]').val("");
			$('#divNomeIngrediente').removeClass('is-focused');
			$('#divObsIngrediente').removeClass('is-focused');
			$('#addIngredienteModal').modal('hide');
			$('#addNovoIngredienteModal').modal('show');
		});
	}

	/**
	 *
	 */
	function apagarVinculo(){
		$('table#tabela-ingredientes').on('click', 'a#apagarIngrediente', function() {
			let idingrediente = $(this).attr("data-id");
			let idreceita = $("#idReceita").val();
			Swal.fire({
				icon: 'warning',
				title: 'Tem certeza que deseja desvicular este ingrediente?',
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#34c38f',
				cancelButtonColor: '#f46a6a',
				cancelButtonText: 'Não',
				confirmButtonText: 'Sim'
			}).then((result) => {
				if (result.value) {
					var form = new FormData();
					form.append('idingrediente', idingrediente);
					form.append('idreceita', idreceita);
					$.ajax({
						url: url+'Receita/deletarVinculoIngrediente',
						data: form,
						cache: false,
						contentType: false,
						processData: false,
						type: 'POST',
						success: function (result, status) {
							Swal.fire({
								title:  'Ingrediente Desvinculado!',
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

	/**
	 *
	 */
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
						if(dados.error){
							Swal.fire({
								icon: 'warning',
								title: 'Ocorreu um Problema',
								text: dados.error
							});
						}else{
							Swal.fire({
								title: 'Ingrediente salvo!',
								icon: 'success',
								confirmButtonText: 'OK'
							}).then((result) => {
								$('#addNovoIngredienteModal').modal('hide');
								let text = nome;
								text = obs != '' ? text+ " ("+obs+")":text;
								var data = {
									id: dados.id,
									text: text
								};
								var newOption = new Option(data.text, data.id, true, true);
								$('.select_ingredientes').append(newOption).trigger('change');
								modalAddIngrediente();
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

	/**
	 *
	 * @param form
	 * @returns {boolean}
	 */
	function verificarForm(form)
	{
		for (var value of form.values()) {
			if(value == undefined || value == '' || value == 'null' || value == 'undefined'){
				return  true;
			}
		}
		return false;
	}

	function init(){
		modalAddNovoIngrediente();
		vincularIngrediente();
		apagarVinculo();
		addIngrediente();
	}

	init();

})(jQuery)

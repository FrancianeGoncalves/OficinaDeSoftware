(function ($) {
	var url = $("#base_url").val();
	var update = parseInt($("#actios_update").val());
	$(document).ready(function() {
		var table = null;
		if(update==1) {
			table = $('#tabela-utensilios').DataTable({
				lengthChange: false,
				scrollX: false,
				scrollY: false,
				dom: '<"top"<"left-col"B><"center-col"l><"right-col"f>>rtip',
				buttons: [
					{
						className: 'btn btn-warning btnWarning',
						text: '<span class="btn-inner--icon "><i class="fa fa-plus"></i></span>',
						action: function (e, dt, node, config) {
							modalAddUtensilio();
						}
					}
				],
				"language": {
					sEmptyTable: "Nenhum utensilio encontrado",
					sInfo: "Mostrando de _START_ até _END_ de _TOTAL_ registros",
					sInfoEmpty: "Mostrando 0 até 0 de 0 registros",
					sInfoFiltered: "(Filtrados de _MAX_ registros)",
					sInfoPostFix: "",
					sInfoThousands: ".",
					sLengthMenu: "_MENU_ resultados por página",
					sLoadingRecords: "Carregando...",
					sProcessing: "Processando...",
					sZeroRecords: "Nenhum Utensilio encontrado",
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
		}else{
			table = $('#tabela-utensilios').DataTable({
				lengthChange: false,
				scrollX: false,
				scrollY: false,
				columnDefs: [
					{
						target:2 ,
						visible: false,
						searchable: false,
					}
				],
				dom: '<"top"<"left-col"B><"center-col"l><"right-col"f>>rtip',
				"language": {
					sEmptyTable: "Nenhum utensilio encontrado",
					sInfo: "Mostrando de _START_ até _END_ de _TOTAL_ registros",
					sInfoEmpty: "Mostrando 0 até 0 de 0 registros",
					sInfoFiltered: "(Filtrados de _MAX_ registros)",
					sInfoPostFix: "",
					sInfoThousands: ".",
					sLengthMenu: "_MENU_ resultados por página",
					sLoadingRecords: "Carregando...",
					sProcessing: "Processando...",
					sZeroRecords: "Nenhum Utensilio encontrado",
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
		}
		table.buttons().container()
			.appendTo('#datatable-empresas_wrapper .col-md-6:eq(0)');
		$(".paging_simple_numbers").addClass('pagination pagination-primary');
		$(".dataTables_paginate").addClass('pagination pagination-primary');
	});

	/**
	 *
	 */
	function modalAddUtensilio(){
		$('.select_utensilios').select2({ width: '100%' });
		$('#addUtensilioModal').modal('show');
	}

	/**
	 *
	 */
	function vincularUtensilio(){
		$('div.modal-footer').on('click', 'button.vincularUtensilio', function() {
			let utensilio = $(".select_utensilios").val();
			let receita = $("#idReceita").val();
			var form = new FormData();
			form.append('utensilio', utensilio);
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
					url: url+'Receita/vincularUtensilio',
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
								title: 'Vinculo de Utensílio Atualizado!',
								icon: 'success',
								// confirmButtonColor: '#1A73E8',
								confirmButtonText: 'OK'
							}).then((result) => {
								location.reload();
							});
						}else{
							Swal.fire({
								title: 'Utensílio Vinculado!',
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
	function modalAddNovoUtensilio(){
		$('div.modal-footer').on('click', 'button.modalAddNovoUtensilio', function() {
			$('#addNovoUtensilioModal [name="nome_utensilio"]').val("");
			$('#addNovoUtensilioModal [name="obs_utensilio"]').val("");
			$('#divNomeUtensilio').removeClass('is-focused');
			$('#divObsUtensilio').removeClass('is-focused');
			$('#addUtensilioModal').modal('hide');
			$('#addNovoUtensilioModal').modal('show');
		});
	}

	/**
	 *
	 */
	function apagarVinculo(){
		$('table#tabela-utensilios').on('click', 'a#apagarUtensilio', function() {
			let idutensilio = $(this).attr("data-id");
			let idreceita = $("#idReceita").val();
			Swal.fire({
				icon: 'warning',
				title: 'Tem certeza que deseja desvicular este utensílio?',
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#34c38f',
				cancelButtonColor: '#f46a6a',
				cancelButtonText: 'Não',
				confirmButtonText: 'Sim'
			}).then((result) => {
				if (result.value) {
					var form = new FormData();
					form.append('idutensilio', idutensilio);
					form.append('idreceita', idreceita);
					$.ajax({
						url: url+'Receita/deletarVinculoUtensilio',
						data: form,
						cache: false,
						contentType: false,
						processData: false,
						type: 'POST',
						success: function (result, status) {
							Swal.fire({
								title:  'Utensílio Desvinculado!',
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
	function addUtensilio(){
		$('div.modal-footer').on('click', 'button.saveUtensilio', function() {
			let nome = $("#nome_utensilio").val();
			let obs = $("#obs_utensilio").val();
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
					url: url+'Utensilio/salvar',
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
								title: 'Utensílio salvo!',
								icon: 'success',
								confirmButtonText: 'OK'
							}).then((result) => {
								$('#addNovoUtensilioModal').modal('hide');
								let text = nome;
								text = obs != '' ? text+ " ("+obs+")":text;
								var data = {
									id: dados.id,
									text: text
								};
								var newOption = new Option(data.text, data.id, true, true);
								$('.select_utensilios').append(newOption).trigger('change');
								modalAddUtensilio();
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
		modalAddNovoUtensilio();
		vincularUtensilio();
		apagarVinculo();
		addUtensilio();
	}

	init();

})(jQuery)

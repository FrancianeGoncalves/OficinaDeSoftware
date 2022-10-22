(function ($) {
	var url = $("#base_url").val();
	$(document).ready(function() {
		var table = $('#tabela-utensilios').DataTable({
			lengthChange: false,
			scrollX: false,
			scrollY: false,
			dom: '<"top"<"left-col"B><"center-col"l><"right-col"f>>rtip',
			buttons: [
				{
					className: 'btn btn-warning btnWarning',
					text: '<span class="btn-inner--icon "><i class="fa fa-plus"></i></span>',
					action: function ( e, dt, node, config ) {
						modalAddUtensilio();
					}
				}
			],
			"language": {
				sEmptyTable: "Nenhum utensílio encontrado",
				sInfo: "Mostrando de _START_ até _END_ de _TOTAL_ registros",
				sInfoEmpty: "Mostrando 0 até 0 de 0 registros",
				sInfoFiltered: "(Filtrados de _MAX_ registros)",
				sInfoPostFix: "",
				sInfoThousands: ".",
				sLengthMenu: "_MENU_ resultados por página",
				sLoadingRecords: "Carregando...",
				sProcessing: "Processando...",
				sZeroRecords: "Nenhum utensílio encontrado",
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

	function modalAddUtensilio(){
		document.getElementById('editarUtensilio').style.display = "none";
		document.getElementById('saveUtensilio').style.display = "block";
		$('#addUtensilioModal [name="nome_utensilio"]').val("");
		$('#addUtensilioModal [name="obs_utensilio"]').val("");
		$('#addUtensilioModal [name="idutensilio"]').val("");
		$('#divNome').removeClass('is-focused');
		$('#divObs').removeClass('is-focused');
		$("#exampleModalLabel").html("Novo Utensílio");
		$('#addUtensilioModal').modal('show');
	}

	function modalEditarUtensilio(){
		$('td').on('click', 'a.bntEditarUtensilio', function() {
			document.getElementById('editarUtensilio').style.display = "block";
			document.getElementById('saveUtensilio').style.display = "none";
			$('#addUtensilioModal [name="nome_utensilio"]').val($(this).attr("data-nome"));
			$('#addUtensilioModal [name="obs_utensilio"]').val($(this).attr("data-obs"));
			$('#addUtensilioModal [name="idutensilio"]').val($(this).attr("data-id"));
			$('#divNome').addClass('is-focused');
			$('#divObs').addClass('is-focused');
			$("#exampleModalLabel").html("Editar Utensílio");
			$('#addUtensilioModal').modal('show');
		});
	}

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
						if(result.error){
							Swal.fire({
								icon: 'warning',
								title: 'Ocorreu um Problema',
								text: result.error
							});
						}else{
							Swal.fire({
								title: 'Utensílio salvo!',
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

	function editarUtensilio(){
		$('div.modal-footer').on('click', 'button.editarUtensilio', function() {
			let nome = $("#nome_utensilio").val();
			let obs = $("#obs_utensilio").val();
			let id = $("#idutensilio").val();
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
					url: url+'Utensilio/editar',
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
								title: 'Utensílio editado!',
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
		$('td').on('click', 'a#apagarUtensilio', function() {
			let id = $(this).attr("data-id");
			Swal.fire({
				title: 'Tem certeza que deseja deletar este utensílio?',
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
						url: url+'Utensilio/deletar',
						data: form,
						cache: false,
						contentType: false,
						processData: false,
						type: 'POST',
						success: function (result, status) {
							Swal.fire({
								title: 'Utensílio deletado!',
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
		addUtensilio();
		editarUtensilio();
		apagar();
		modalEditarUtensilio();
	}

	init();

})(jQuery)

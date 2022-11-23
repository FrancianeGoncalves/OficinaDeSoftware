(function ($) {
	var url = $("#base_url").val();
	$(document).ready(function() {
		var table = $('#tabela-receitas').DataTable({
			lengthChange: false,
			scrollX: false,
			scrollY: false,
			dom: '<"top"<"left-col"B><"center-col"l><"right-col"f>>rtip',
			buttons: [
				{
					className: 'btn btn-warning btnWarning',
					text: '<span class="btn-inner--icon "><i class="fa fa-plus"></i></span>',
					action: function ( e, dt, node, config ) {
						modalAddReceita();
					}
				}
			],
			"language": {
				sEmptyTable: "Nenhuma Receita encontrada",
				sInfo: "Mostrando de _START_ até _END_ de _TOTAL_ registros",
				sInfoEmpty: "Mostrando 0 até 0 de 0 registros",
				sInfoFiltered: "(Filtrados de _MAX_ registros)",
				sInfoPostFix: "",
				sInfoThousands: ".",
				sLengthMenu: "_MENU_ resultados por página",
				sLoadingRecords: "Carregando...",
				sProcessing: "Processando...",
				sZeroRecords: "Nenhuma Receita encontrada",
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

	function modalAddReceita(){
		$('#addReceitaModal [name="nome_receita"]').val("");
		$('#divNome').removeClass('is-focused');
		$('#addReceitaModal').modal('show');
	}
	
	function saveReceita(){
		$('div.modal-footer').on('click', 'button.saveReceita', function() {
			let nome = $("#nome_receita").val();
			if(nome == null || nome == "" || nome == undefined){
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Favor digite um nome!'
				});
			}else{
				var form = new FormData();
				form.append('nome', nome);
				$.ajax({
					url: url+'Receita/salvar',
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
								title: 'Receita salva!',
								icon: 'success',
								// confirmButtonColor: '#1A73E8',
								confirmButtonText: 'OK'
							}).then((result) => {
								window.location.href = url + "Receita/receita/"+dados.success;
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

	function editarReceita(){
		$('div#editarReceitaDiv').on('click', 'button#editarReceita', function() {
			let nome = $("#nome").val();
			let uid = $("#uidReceita").val();
			let rendimento = $("#rendimento").val();
			let tempo = $("#tempo").val();
			let modo_preparo =  $("#modo_preparo").val();
			modo_preparo = modo_preparo.replaceAll('<br>', '\n').replaceAll('<br><br>', '\n\n');
			var form = new FormData();
			form.append('nome', nome);
			form.append('rendimento', rendimento);
			form.append('tempo', tempo);
			form.append('modo_preparo', modo_preparo);
			form.append('uid', uid);
			let error = verificarForm(form);
			if(error){
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Favor preencha todos os campos!'
				});
			}else{
				$.ajax({
					url: url+'Receita/editar',
					data: form,
					cache: false,
					contentType: false,
					processData: false,
					type: 'POST',
					success: function (result, status) {
						let dados = JSON.parse(result);
						if(dados.error){
							let erros = dados.error.replaceAll('<p>','').replaceAll('</p>','').replaceAll('\n','<br>');
							Swal.fire({
								icon: 'warning',
								title: 'Ops...',
								html: erros
							});
						}else{
							Swal.fire({
								title: 'Receita Editada!',
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
		$('div#editarReceitaDiv').on('click', 'a#deletar_receita', function() {
			let id = $("#uidReceita").val();
			Swal.fire({
				icon:'warning',
				title: 'Tem certeza que deseja deletar a receita?',
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#34c38f',
				cancelButtonColor: '#f46a6a',
				cancelButtonText: 'Não',
				confirmButtonText: 'Sim'
			}).then((result) => {
				if (result.value) {
					var form = new FormData();
					form.append('uid', id);
					$.ajax({
						url: url+'Receita/deletar',
						data: form,
						cache: false,
						contentType: false,
						processData: false,
						type: 'POST',
						success: function (result, status) {
							Swal.fire({
								title: 'Receita Deletada!',
								icon: 'success',
								confirmButtonText: 'OK'
							}).then((result) => {
								window.location.href = url + "Receita";
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
	function uploadImg()
	{
		$('div#imgReceitaDiv').on('click', 'button#uploadimg', function() {
			let form = new FormData();
			let arquivo = $('#formFile').prop('files')[0];
			let uid = $("#uidReceita").val();
			form.append('arquivo', arquivo);
			form.append('uid', uid);
			let error = verificarForm(form);
			if(!error) {
				$.ajax({
					url: url + "Receita/uploadImg",
					data: form,
					cache: false,
					contentType: false,
					processData: false,
					type: 'POST',
					success: function (result, status) {
						let dados = JSON.parse(result);
						if(dados.error){
							let erros = dados.error.replaceAll('<p>','').replaceAll('</p>','').replaceAll('\n','<br>');
							Swal.fire({
								icon: 'warning',
								title: 'Ops...',
								html: erros
							});
						}else{
							Swal.fire({
								title: 'Upload Realizado com Sucesso!',
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
			}else{
				Swal.fire({
					icon: 'warning',
					title: 'Ocorreu um Problema',
					text: 'Selecione uma imagem!'
				});
			}
		});
	};

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
		saveReceita();
		editarReceita();
		apagar();
		uploadImg();
	}

	init();

})(jQuery)

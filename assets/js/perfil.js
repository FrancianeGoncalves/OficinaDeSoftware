(function ($) {
	var url = $("#urlBase").val();
	function deletar_usuario() {
		$('#deletar_usuario').on('click', function (event) {
			Swal.fire({
				title: 'Tem Certeza que deseja Apagar sua Conta?',
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#34c38f',
				cancelButtonColor: '#f46a6a',
				cancelButtonText: 'Não',
				confirmButtonText: 'Sim'
			}).then((result) => {
				if (result.value) {
					Swal.fire({
						title: 'Digite:',
						text: "Desejo apagar minha conta",
						input: 'text',
						inputAttributes: {
							autocapitalize: 'off'
						},
						showCancelButton: true,
						confirmButtonText: 'Confirmar',
						cancelButtonText: 'Cancelar',
						preConfirm: (textConfirm) => {
							if(textConfirm == "Desejo apagar minha conta"){
								$.ajax({
									type: "POST",
									url: url+"Usuario/deletar",
									dataType: "text",
									cache: false,
									success: function (data) {
										Swal.fire({
											title: 'Conta Excluída',
											icon: 'success',
											confirmButtonColor: '#50a5f1',
											confirmButtonText: 'OK'
										}).then((result) => {
											window.location = url;
										});
									}
								});
							}else {
								Swal.fire({
									title: 'Erro!',
									text: 'Texto Incorreto',
									icon: 'error',
									confirmButtonText: 'OK'
								});
							}

						},
					});
				}
			})
		});
	}

	function editarUsuario(){
		$('div#editarUsuarioDiv').on('click', 'button#editarUsuario', function() {
			let cpf = $("#cpf").val();
			let nome = $("#nome").val();
			let nome_usuario = $("#nome_usuario").val();
			let email = $("#email").val();
			let senha = $("#senha").val();
			let senha_confirmar = $("#senha_confirmar").val();
			var form = new FormData();
			form.append('nome', nome);
			form.append('cpf', cpf);
			form.append('nome_usuario', nome_usuario);
			form.append('email', email);
			form.append('senha', senha);
			form.append('senha_confirmar', senha_confirmar);
			let error = verificarForm(form);
			if(error){
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Favor preencha todos os campos!'
				});
			}else{
				$.ajax({
					url: url+'Usuario/editar',
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
								title: 'Usuário editado!',
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

	function editarAvatar(){
		$('div#divAvatar').on('click', 'button#editarAvatar', function() {
			$('#modalAvatar').modal('show');
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
		deletar_usuario();
		editarUsuario();
		editarAvatar();
	}

	init();
})(jQuery)

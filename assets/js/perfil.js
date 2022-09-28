(function ($) {
	function deletar_usuario() {
		$('#deletar_usuario').on('click', function (event) {
			//debugger;
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
								let base = $("#urlBase").val();
								$.ajax({
									type: "POST",
									url: base+"Usuario/deletar",
									dataType: "text",
									cache: false,
									success: function (data) {
										Swal.fire({
											title: 'Conta Excluída',
											icon: 'success',
											confirmButtonColor: '#50a5f1',
											confirmButtonText: 'OK'
										}).then((result) => {
											window.location = base;
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

	function init(){
		deletar_usuario();
	}

	init();
})(jQuery)

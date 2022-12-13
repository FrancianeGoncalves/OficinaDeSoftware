(function ($) {
	var url = $("#base_url").val();
	$(document).ready(function() {
		$('.select_ingredientes').select2({ width: '100%' });
		$('.select_utensilios').select2({ width: '100%' });
	});

	/**
	 *
	 * @param value
	 * @returns {string|*}
	 */
	function verificarForm(value)
	{
		if(value == undefined || value == '' || value == 'null' || value == 'undefined'
			|| value == null || value == undefined
		){
			return  null;
		}
		return value;
	}

	function buscar(){
		$('body').on('click', 'button#pesquisarReceitas', function() {
			var form = new FormData();
			let ingredientes =  $(".select_ingredientes").val();
			let utensilios =  $(".select_utensilios").val();
			ingredientes = verificarForm(ingredientes);
			utensilios = verificarForm(utensilios);
			form.append('ingredientes', ingredientes);
			form.append('utensilios',  utensilios);
			$.ajax({
				url: url+'Busca/buscar',
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
							title: 'Ops...',
							text: dados.error
						});
					}else{
						window.location.href = url +  "Busca/listResultado";
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
		});
	}

	function modalReceita(){
		$('body').on('click', 'a.bntLerReceita', function() {
			debugger;
			let dados = $(this).attr("data-dados");
			dados = JSON.parse(dados);
			$("#exampleModalLabel").html(dados.nome);
			$('#modalReceita').modal('show');
		});
	}



	function init(){
		modalReceita();
		buscar();
	}

	init();
})(jQuery)

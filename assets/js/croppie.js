

(function ($) {

    'use strict';
	var url = $("#urlBase").val();
    var resize = $('#uploadCroppieUser').croppie({
        enableExif: true,
        enableOrientation: true,
        viewport: { // Default { width: 100, height: 100, type: 'square' }
            width: 200,
            height: 200,
            type: 'circle' //square
        },
        boundary: {
            width: 300,
            height: 300
        }
    });

    $(".imagePerfilUser").change(function() {

        var arquivo = $('.imagePerfilUser').val();
        if(arquivo.indexOf (".png") == -1 && arquivo.indexOf (".jpeg") == -1 &&  arquivo.indexOf (".jpg") == -1){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Favor Selecione uma imagem com uma extensão correta '
            });
            document.getElementById("formImgHeader").reset();
            document.getElementById("inputGroupFile04").value = "";
        }else {
            var reader = new FileReader();
            reader.onload = function (e) {
                resize.croppie('bind',{
                    url: e.target.result
                }).then(function(){
                    //  console.log('jQuery bind complete');
                });
            }
            reader.readAsDataURL(this.files[0]);
        }
    });

	$('div.modal-footer').on('click', 'button#saveAvatar', function() {
        var arquivo = $('.imagePerfilUser').prop('files')[0];
        var form = new FormData();
        form.append('file', arquivo);
		let cpf = $("#cpf").val();
		form.append('cpf', cpf);

        var error = 0;
        for (var value of form.values()) {
            if(value == undefined || value == '' || value == 'null' || value == 'undefined'){
                error = 1;
            }
        }
        if(error){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Favor Selecione uma imagem'
            });
        }else {
            resize.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function (img) {
                $.ajax({
                    url: url+"Usuario/upload_imagem_croppie",
                    type: "POST",
                    data: {"image": img,"cpf":cpf},
                    success: function (data) {
						Swal.fire({
							title: 'Avatar salvo!',
							icon: 'success',
							// confirmButtonColor: '#1A73E8',
							confirmButtonText: 'OK'
						}).then((result) => {
							location.reload();
						});
                    }
                });
            });
        }
    });

	$('div.modal-footer').on('click', 'button#apagarAvatar', function() {
        Swal.fire({
            title: 'Tem certeza que deseja apagar seu avatar atual?',
            text: "O avatar não poderá ser recuperado",
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Sim'
        }).then((result) => {
            $.ajax({
				url: url+"Usuario/apagarImagem",
                cache: false,
                contentType: false,
                processData: false,
				type: "POST",
                success: function (result, status) {
                    if (status == "success") {
						Swal.fire({
							title: 'Avatar excluído!',
							icon: 'success',
							// confirmButtonColor: '#1A73E8',
							confirmButtonText: 'OK'
						}).then((result) => {
							location.reload();
						});
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    spinner.hide();
                    Swal.fire({
                        icon: 'error',
                        title: 'Entre em contato com o Suporte para verificar o problema',
                    });
                },
            });
        });
    });
    function init() {

    }

    init();

})(jQuery)

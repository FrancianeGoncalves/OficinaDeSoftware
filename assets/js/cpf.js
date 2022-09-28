(function ($) {
$(document).ready(function () {
	var inputCpf = $("#cpf");
	inputCpf.mask('000.000.000-00', {reverse: true});
});
$("#myForm").submit(function() {
	$("#cpf").unmask();
});
})(jQuery)

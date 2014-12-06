// JavaScript Document

$(document).ready( function() {
	/*Executa a requisição quando o campo de cep perder o foco*/
	$('#cep').blur(function(){
		/*configura a requisição ajax*/
		$.ajax({
			url:"consultar_cep.php",
			type:'POST',
			data:'cep=' + $('#cep').val(),
			dataType:"json",
			success: function(data){
				if(data.sucesso == 1){
					$('#rua').val(data.rua);
					$('#bairro').val(data.bairro);
					$('#cidade').val(data.cidade);
					$('#estado').val(data.estado);
					
					$('#numero').focus();
				}
			}
		});
	return false;
	})
});
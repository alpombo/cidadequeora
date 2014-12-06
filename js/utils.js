 $(document).ready(function(){
        // Evento change no campo bairro 
         $("select[name=bairro]").change(function(){
            // Exibimos no campo marca antes de concluirmos
            // Passando tipo por parametro para a pagina ajax-cep.php
            $.post("ajax-cep.php",
                  {tipo:$(this).val()},
                  // Carregamos o resultado acima para o campo cep
                  function(valor){
                     $('#abc').empty();
                     $('#abc').append(valor);
                  });
         });
      });


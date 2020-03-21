$( () => {

     $('#form').on('submit', function( eventSubmit ){

          eventSubmit.preventDefault();

          let parametros = $(this).serialize();
          console.log(parametros);

          $.ajax(
               {
                    type:     'POST',
                    url:      'ajax.php',
                    data:     parametros,
                    dataType: 'json',
                    success:  (respostaJson) => {

                         console.log(respostaJson);
                         $('.div').html("Nome: "+respostaJson.nome);
                    }
               }
          );
     })
} );
$( function(){

     $('#form').on('click', function(eventoSubmit){

          eventoSubmit.preventDefault();

          let parametros = $(this).serialize();
          console.log(parametros);

          $.ajax(
               {
                    type      : 'POST',
                    url       : 'ajax.php',
                    data      : parametros,
                    success   : (resultado) => {

                         $('.div').html("Resultado: "+resultado);
                    },
                    error     : () => {

                         alert("ERRO.");
                    }
               }
          )
     });
} );
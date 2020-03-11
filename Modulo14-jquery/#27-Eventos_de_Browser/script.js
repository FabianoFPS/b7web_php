$(inicializacao);

function inicializacao(){

     $('#div').bind('scroll', function(){

          console.log('Scrollou');
          $(this).css('background-color', 'green');
     });

     $(window).bind('resize', function(){

          console.log('Mudou om tamanho da tela');
     });
}
$(function(){

     $('#form').bind('submit', function(evento){

          evento.preventDefault();
     });

     $('#nome').bind('keydown', function(){

          console.log('Uma tecla foi apertada.');
     });
     
     $('#nome').bind('keyup', function(evento){

          console.log('Tecla apertada foi '+evento.keyCode);

          if(evento.keyCode == 13){

               console.log( "ENTER: "+$(this).val() );
          }
     });
});
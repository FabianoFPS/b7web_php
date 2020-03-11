$(function(){

     $('#form').bind('submit', function(evento){

          evento.preventDefault();
          console.log('Formulário foi submitado!');
     });

     $('#nome').bind('select', function(){

          console.log('Algo foi selecionado.')
     });

     $('#nome, #email').bind('focus', function(){

          $(this).addClass('focado');
     });

     $('#nome, #email').bind('blur', function(){

          $(this).removeClass('focado');
     });

     $('#idade').bind('change', function(){

          console.log( $(this).val() );
     });
});
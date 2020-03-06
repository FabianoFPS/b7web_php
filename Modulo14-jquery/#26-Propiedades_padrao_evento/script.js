$(function(){

     $('#botao').bind('click', function(evento){

          evento.preventDefault();

          let txt = $('#texto').val();
          alert(`${txt} - ${evento.type} - ${evento.target}`);
          console.log(evento.target);
     });
});
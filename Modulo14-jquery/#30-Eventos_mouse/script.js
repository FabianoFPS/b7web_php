$(function(){

     $('.botao').bind('mousedown', function(){

          console.log("Apertou o Mouse");
     });

     $('.botao').bind('mouseup', function(){

          console.log("Soltou o Mouse");
     });

     $('.botao').bind('mousemove', function(){

          console.log("moveu o Mouse");
     });

     $('.botao').bind('mouseover', function(){

          $(this).addClass('botaoCima');
          console.log("o Mouse está em cima");
     });

     $('.botao').bind('mouseout', function(){

          $(this).removeClass('botaoCima');
          console.log("o Mouse saio");
     });

     $('.botao').bind('click', function(){

          console.log("clicou o Mouse");
     });

     $('.botao').bind('dblclick', function(){

          console.log("Duplo click");
     });
});
$(function () {
   
     eventoBotao('#id_btn1', 'fundoVermelho');
     toggleC('#id_btn2', 'fundoVermelho');
     ratoPorBaixo('#id_btn3', 'fundoVermelho');
     ratoFora('#id_btn4', 'fundoVermelho');
});

function eventoBotao(p_id, p_class){

     $(p_id).click(function (){

          alert(`Cliclou no botão de id ${p_id} e vai ficar vermelho!`);

          if( $(this).hasClass(p_class) ){

               $(this).removeClass(p_class);
               return;
          }

          $(this).addClass(p_class);
     });
}

function toggleC(p_id, p_class) {
     
     $(p_id).click(function(){

          $(this).toggleClass(p_class);
     });
}

function ratoPorBaixo(p_id, p_class){

     $(p_id).mouseover(function(){

          $(this).toggleClass(p_class);
     });
}

function ratoFora(p_id, p_class){

     $(p_id).mouseout(function(){

          $(this).toggleClass(p_class);
     });
}

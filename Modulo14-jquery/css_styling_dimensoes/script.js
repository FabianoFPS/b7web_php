$(function () {
     
     add_class();
     cssButton();
     input();
     setTimeout(() => { del_class(); }, 2000);
     setTimeout(() => { letraAzul(); }, 2500);
     setTimeout(() => { tamanho15(); }, 3000);

});

function add_class(){

     $('h1').addClass("fundovermelho");
}

function del_class(){

     if(existeClass('fundovermelho')){

          $('h1').removeClass('fundovermelho');
     }

}

function existeClass(nomeClasse){

     if( $('h1').hasClass(nomeClasse) ){

          return true;
     }

     return false;
}

function letraAzul(){

     $('h1').css("color", "#0000FF");
}

function tamanho15(){

     $('h1').css("font-size", "15px");
}

function cssButton(){

     $('button').css('border', '1px solid #000').css('background-color', '#FF0000').css('color', '#FFFF');
}

function input(){

     $('input').css("width", '500px');

     $('input').addClass("campodetexto");
}
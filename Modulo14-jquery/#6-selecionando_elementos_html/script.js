$(function(){

     selecionarBotaoPorID();
});

function selecionarBotaoPorID(){

     $("#btn1");
}

function selecionaPorClasse(){

     $('.teste');
}

function selecionaPorTag(){

     $('li');
}

function selecionaPorTagEClasse(){

     $('li.class_li');
}

function selecionaClassClass() {
     
     $('.lista2 li.class_li');
}

function existeElemento( elemento ) {
     
     if ( $(elemento).length > 0 ) {

          return true;
     }

     return false;
}


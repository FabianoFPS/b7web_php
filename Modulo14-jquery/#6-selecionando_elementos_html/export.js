export default function inicia(){

     console.log('linha 3');

     $(function(){

          selecionarBotaoPorID();
     });
}

function selecionarBotaoPorID(){

     let elemento = $("#btn1");
     console.log(elemento);
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


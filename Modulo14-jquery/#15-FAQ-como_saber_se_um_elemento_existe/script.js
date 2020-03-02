$( function(){

     console.log( existeElemento('#algo') );
     console.log( existeElemento('#burritos') );
});

function existeElemento( idElemento ){

     if ( $(idElemento).length == 0 ) {
          
          return 'Não existe o elemento: '+idElemento;
     }

     return 'Existe o elemento: '+idElemento;
}
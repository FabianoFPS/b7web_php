let valor; //variavel global, definida fora de função.
let inteiro = 100;
let float = 1.1;

$( function(){

     valor = selecionaDiv('algo');

     usaEach('li');

     console.log( tipoVariavel( valor ) );
     console.log( tipoVariavel( inteiro ) );
     console.log( tipoVariavel( float ) );

     console.log( ehNumero( valor ) );
     console.log( ehNumero( inteiro ) );

     
     $.isArray( valor );
     $.isFunction( valor );
} );

function selecionaDiv(id){

     let html = $(`#${id}`).html();
     html = $.trim(html);
     console.log(html);

     return html;
}

function usaEach(tag){

     $(tag).each( function(){

          alert( $(this).html() );
     } );
}

function tipoVariavel(variavel){

     let tipo = $.type( variavel );
     return tipo;

     //js puro typeof
}

function ehNumero(numero){

     return $.isNumeric( numero );
}

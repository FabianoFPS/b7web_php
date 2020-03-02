$( function () {

     h1();
     div();
     li();
});

function h1(){

     let titulo = $('h1');
     titulo.html('Novo título.');
}

function div(){

     let div = document.getElementById('id_div');
     $(div).html("Novo texto");
}

function li(){

     //Seleiconar o segundo li
     //começa em eq(0)
     $('li:eq(1)').html('Novo texto');
     //OU * mas agora selecionando o 3º li
     $('li').eq(2).html("Novo texto: $(\'li\').eq(2)")

}
$(function () {
     
     incluiURL();
     manipulaIMG();
});

function incluiURL(){

     let elemento =  $('a');
     elemento.attr('href', 'http://www.google.com.br');
}

function manipulaIMG(){

     let imagem = $('#img1');
     imagem.attr('width', '100');
     imagem.attr('border', '5');
     console.log( imagem.attr('alt') );
}
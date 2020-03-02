$(function(){

     let botao = $('#id1 button').addClass('estilo');
     //OU
     let botao2opcao = $('#id1').find('button');

     let div2 = $('#div2');
     div2.html(botao);

     let div3 = $('#div3');
     div3.html(botao2opcao);

     let conteudoAntigo = $('#id1').html();

     let div = $('#id1');
     div.html("Texto Mudado.");

     console.log(conteudoAntigo);

     botao2opcao.html('Novo nome do meu botão');
});
$(function(){

    filha();
    topo();
    conteudo();
});

function filha(){

     $('.filha').parent().append('<b>append</b>');
}

function topo(){

     $('.filha').closest('.topo').append('<b>append2</b>');
}

function conteudo(){

     $('.filha').closest('.site').find('.conteudo').append('COnteudo_append');
}
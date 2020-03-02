$(function(){

     setTimeout(() => { desabilita('#nome'); }, 2000);
     setTimeout(() => { abilita('#nome'); }, 4000);
     setTimeout(() => { abilita('#nome2'); }, 6000);
     setTimeout(() => { desabilita('#salvo'); }, 8000);
     setTimeout(() => { abilita('#salvo'); desseleciona('#salvo');}, 10000);
     setTimeout(() => { seleciona('#salvo'); }, 2000);
});

function desabilita( idElemento ){

     $(idElemento).attr('disabled', 'disabled');
}

function abilita( idElemento ){

     $(idElemento).removeAttr('disabled');
}

function seleciona( idElemento ){

     $(idElemento).attr('checked', 'checked');
}

function desseleciona( idElemento ){

     $(idElemento).removeAttr('checked');
}
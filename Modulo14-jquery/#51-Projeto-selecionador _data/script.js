$(()=>{

    let input = $('input');
    let btn = $('.horaescolhe button');
    let campoEmFoco;

    eventoMostraBotoes(input);
    // $('input').on( 'focus', function(){

    //     let posicaoCampoFocado = $(this).offset();
    //     let largura = $(this).width();
    //     let esquerdaCompensada = posicaoCampoFocado.left + largura + 20;

    //     console.log(`esquerda: ${posicaoCampoFocado.left}, largura: ${largura}`);

    //     apresentabotoes($('.horaescolhe'), esquerdaCompensada, posicaoCampoFocado.top);

        
    // } );

    eventoEsconde( input );

    // $('input').on('blur', function(){

    //     console.log('perdeu o foco');

    //     $('.horaescolhe').hide();
    // });
    eventoBotao(btn);
});

/**
 * 
 * @param {*} elemento 
 * @param {number} posicaoEsquerda Posição esquerda para iniciar conjunto de botões.
 * @param {number} posicaoSuperior 
 */
function apresentabotoes (elemento, posicaoEsquerda, posicaoSuperior){

    elemento.css('left', posicaoEsquerda);
    elemento.css('top', posicaoSuperior);
    elemento.show();
}

function eventoMostraBotoes(elemento){

    elemento.on( 'focus', function(){

        campoEmFoco = $(this);
        let posicaoCampoFocado = $(this).offset();
        let largura = $(this).width();
        let esquerdaCompensada = posicaoCampoFocado.left + largura + 20;

        console.log(`esquerda: ${posicaoCampoFocado.left}, largura: ${largura}`);

        apresentabotoes($('.horaescolhe'), esquerdaCompensada, posicaoCampoFocado.top);

        
    } );
}

function eventoEsconde(elemento){

    elemento.on('blur', function(){

        console.log('perdeu o foco');

        setTimeout(() => { $('.horaescolhe').hide() }, 200);
        
    });
}

function eventoBotao (elemento){

    elemento.on('click', function(){

        let hora = $(this).html();
        campoEmFoco.val(hora);
    });
}
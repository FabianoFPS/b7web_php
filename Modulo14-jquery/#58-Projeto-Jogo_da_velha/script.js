let o = 'O';
let x = 'X';
let vez = o;

$(function(){

    atualizarPlacar();

    $('.area').on('click', function(){

        if( $(this).find('img').length == 0 ){

            $(this).html(`<img src="${imagemBolaX()}" alt="" height="50">`);
            $(this).attr('data-marcado', vez);

            alternaVez();
            atualizarPlacar();
            
            let campeao = verificarCampeao();

            if( campeao != '' ){
                alert(`O Ganhador foi: ${campeao}`);
                $('.area').html('').attr('data-marcado', '');
                return;
            }

        }
    });
});

function verificarCampeao(){

    let a1 = $('.a1').attr('data-marcado');
    let a2 = $('.a2').attr('data-marcado');
    let a3 = $('.a3').attr('data-marcado');

    let b1 = $('.b1').attr('data-marcado');
    let b2 = $('.b2').attr('data-marcado');
    let b3 = $('.b3').attr('data-marcado');

    let c1 = $('.c1').attr('data-marcado');
    let c2 = $('.c2').attr('data-marcado');
    let c3 = $('.c3').attr('data-marcado');

    let ganhador = '';

    for (let index = 0; index <= 1; index++) {
        
        let op = o;
        if(index != 0){
            op = x;
        }

        //Verificação horizontal
        if( a1 == op && a2 == op && a3 == op){

            ganhador = op;
            break;
        }

        if( b1 == op && b2 == op && b3 == op){

            ganhador = op;
            break;
        }

        if( c1 == op && c2 == op && c3 == op){

            ganhador = op;
            break;
        }

        //Verifcação Cruzada
        if( a1 == op && b2 == op && c3 == op){

            ganhador = op;
            break;
        }
        
        if( a3 == op && b2 == op && c1 == op){

            ganhador = op;
            break;
        }

        //Verificação vetical
        if( a1 == op && b1 == op && c1 == op){

            ganhador = op;
            break;
        }

        if( a2 == op && b2 == op && c2 == op){

            ganhador = op;
            break;
        }

        if( a3 == op && b3 == op && c3 == op){

            ganhador = op;
            break;
        }
    }

    if( a1 != '' && a2 != '' && a3 != '' &&
        b1 != '' && b2 != '' && b3 != '' &&
        c1 != '' && c2 != '' && c3 != '' ){

        $('.area').html('').attr('data-marcado', ''); 
    }

    return ganhador;
}

function alternaVez(){

    if(vez == o){
                
        vez = x;

        return;
    }

    vez = o;
}

function atualizarPlacar(){

    $('#imagem_placar').attr('src', `${imagemBolaX()}`);
}

function imagemBolaX(){

    let imagem = "o.png";
    
    if (vez != o){

        imagem = "x.png";
    }

    return `./img/${imagem}`;
}
$(function(){

    $('#comecar').on('click', function(){
        setInterval(addBola, 1000);
    });
});

function addBola(){

    let posicaoX = Math.floor(Math.random()*1500);
    let posicaoY = Math.floor(Math.random()*550);
    let cor = Math.floor(Math.random()*4);
    let bola = $('<div class="bola"></div>');
    
    bola.css('left', `${posicaoX}px`);
    bola.css('top', `${posicaoY}px`)

    switch (cor) {
        case 0:
            bola.css('background-color', 'blue')
            break;
        case 1:
            bola.css('background-color', 'red')
            break;
        case 2:
            bola.css('background-color', 'yellow')
            break;
        case 3:
            bola.css('background-color', 'black')
            break;
        case 4:
            bola.css('background-color', 'green')
            break;
        default:
            break;
    }

    bola.on('click', function(){
        $(this).fadeOut('fast');

        updatePlacar();
    })
    bola.appendTo(document.body);
    //OU
    //$(document.body).append('<div class="bola"></div>');
}

function updatePlacar(){

    let placar = $('#placar')
    let valorPlacar = placar.html();

    placar.html(++valorPlacar);
}
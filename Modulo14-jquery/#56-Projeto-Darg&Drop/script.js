$(function(){

    $('#objeto').on('mousedown', function(){

        $(this).css('cursor', 'move');

        $(this).on('mousemove', function(evento){

            let elemento = $(this);
            let posicao = {
                x: evento.originalEvent.pageX,
                y: evento.originalEvent.pageY,
                width: $(this).width(),
                height: $(this).height()
            }
            
            movimento(posicao, elemento);
        });
    }).on('mouseup', function(){
        
        $(this).off('mousemove');
        $(this).css('cursor', 'pointer');
    });
});

function movimento(posicao, elemento){

    // console.log(posicao.width);
    elemento.css('left', `${posicao.x - (posicao.width / 2)}px`);
    elemento.css('top', `${posicao.y - ( posicao.height / 2)}px`);
}
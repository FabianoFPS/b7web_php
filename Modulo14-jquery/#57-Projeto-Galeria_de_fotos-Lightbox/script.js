$(function(){

    $('a.galeria').on('click', function () {
        
        let img = $(this).find('img').attr('src');

        $('#imgv').attr('src', img);
        $('.divs').fadeIn('fast');

        let imgWidth = $('#imgv').width();
        let imgHeight = $('#imgv').height();

        $('.divbox').css('margin-left', `-${imgWidth/2}px`);
        $('.divbox').css('margin-top', `-${imgHeight/2}px`);
        return;
    });

    $('.bgbox, .divbox').on('click', function(){

        $('.bgbox, .divbox').fadeOut('fast');
    });
});

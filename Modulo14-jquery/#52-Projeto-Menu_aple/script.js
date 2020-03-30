$(function(){

    $('.icone').hover(function(){

        $(this).animate({
            width: 100,
            height: 100,
            "margin-top": -30
        }, 250);
    },
    function(){

        $(this).animate({
            width: 70,
            height: 70,
            "margin-top": 0
        }, 250);
    });
    
});
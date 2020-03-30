(function($){

    $.fn.mudarCor = function(cor){

        this.each(function(){

            $(this).css('color', cor).css('text-decoration', 'none');

            $(this).hover(function(){

                $(this).css('background-color', 'black');

            }, function(){
                
                $(this).css('background-color', '#FFFFFF');

            });
        });

        return this;
    }

}(jQuery));
$(()=>{

     //$('.hellobar').on('click', function (){ $(this).slideUp(); });

     barraSuperior = $('.hellobar');
     barraSuperior.on('click', () => { barraSuperior.slideUp() });

     $('#botao').on('click', () => { $('.div').slideToggle() });

     setTimeout(() => { $('.div').slideUp('slow') }, 1000);
     setTimeout(() => { $('.div').slideDown() }, 2000);
});

$(function(){

     $('.botao').on('click', function(){

          $('.div').animate(
               {
                    'top': '80',
                    'left': '700',
                    'height': '50',
                    'width': '50'
               },
               {
                    duration: 1500,
                    complete: () => {

                         console.log("Animação finalizada!");
                         
                         $('.div').animate(
                              {
                                   'top': '0',
                                   'left': '0',
                                   'height': '150',
                                   'width': '150'
                              },
                              1500
                         )
                    },
                    start: () => {

                         console.log("Aimação começou!")
                    },
                    step: () => {

                         console.log('Nova etapa...')
                    }
               }
          );
     });
});
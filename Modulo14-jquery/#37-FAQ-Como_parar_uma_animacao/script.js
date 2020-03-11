$(() => {

     $('#btn').on('click', () => {

          $('.div').animate(
               {
                    'margin-left': 1000
               },
               2000
          );
     });

     $('#btn2').on('click', () => {

          $('.div').stop();
     });
});
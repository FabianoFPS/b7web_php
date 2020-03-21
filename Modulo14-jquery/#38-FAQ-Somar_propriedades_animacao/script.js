$(()=>{

     $('#btn').on('click', ()=>{

          $('.div').animate(
               {
                    'margin-left': '+=50'
               },
               500
          );
     });
     $('#btn2').on('click', ()=>{

          $('.div').animate(
               {
                    'margin-left': '-=50'
               },
               500
          );
     });
});
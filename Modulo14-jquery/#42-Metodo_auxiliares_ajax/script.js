$(function(){

     $('#btn1').on('click', function(){

          $('.div').load("teste.html");
     });

     $('#btn2').on('click', function(){

          $.get('teste.html', (data)=>{

               $('.div').html(data);
          });
     });

     $('#btn3').on('click', function(){

          $.post('teste.html', (data)=>{

               $('.div').html(data);
          });
     });
});
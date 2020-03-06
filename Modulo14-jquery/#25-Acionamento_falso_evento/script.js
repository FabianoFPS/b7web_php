$(function(){

     $('#btn1').bind('click', function (){
          alert("Clicou no b1");
          $('#btn2').trigger('click');
     })
     $('#btn2').bind('click', function (){
          alert("Clicou no b2");
     })
    
});
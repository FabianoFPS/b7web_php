$(function(){

     $('#1').bind('click', function () { alert('função bind'); });

     //Removendo evento
     $('#1').unbind('click');

     $('#2').on('click', function () { alert('função on'); });

     $('#2').off('click');

     $.get("teste.json", function (data){

          console.log('encontrei ' + data.length + ' registros');
     })
});
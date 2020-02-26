$('input').attr('data-idade', '90');

$('input').data('idade', '90');

console.log( $('input').data('idade') );


function salvaQuantidadeCaractere(){

     $('input').data('carac', $('input').val().length);
     console.log( $('input').data('carac') + 1 );
}

$(function(){

     console.log( temClasse( 'h1', 'fundovermelho' ) );
     console.log( temClasse( 'span', 'fundovermelho' ) );
     console.log( temClasse( 'input', 'campotexto' ) );
});

function temClasse(tag, classe){

     if ( !( $(tag).hasClass( classe ) ) ) {
          
          return `A TAG ${tag} não possui a CLASSE ${classe}.`;
     }

     return `A TAG ${tag} possui a CLASSE ${classe}.`;
}
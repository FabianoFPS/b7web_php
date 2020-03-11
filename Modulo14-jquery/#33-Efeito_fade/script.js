$(()=>{

     $('#botao').on('click', ()=>{

          console.log('click');

          $('#dv1').fadeToggle();
     });

     setTimeout(() => { efeitoFade('#dv1') }, 1000);
     setTimeout(() => { efeitoFadeIn('#dv1') }, 2000);
     setTimeout(() => {  efeitoFadeTo('#dv1', 0.5) }, 4000);
     setTimeout(() => {  efeitoFadeToggle('#dv1') }, 5000);
     setTimeout(() => {  efeitoFadeToggle('#dv1') }, 6000);
     setTimeout(() => {  efeitoFadeToggleSlow('#dv1') }, 7000);
     setTimeout(() => {  efeitoFadeToggleSlow('#dv1') }, 8000);
});

function efeitoFade(id){

     $(id).fadeOut();
}

function efeitoFadeIn(id){

     $(id).fadeIn();
}

function efeitoFadeTo(id, grau){

     $(id).fadeTo('slow', grau); 
}

function efeitoFadeToggle(id){

     $(id).fadeToggle();
}

function efeitoFadeToggleSlow(id){

     $(id).fadeToggle('slow');
}
$(() => {

     addEvento('#botao', 'click');
     setTimeout(() => { escondeDv('#dv1'); }, 1000);
     setTimeout(() => { exibeDiv('#dv1'); }, 2000);
     setTimeout(() => { apareceDesaparece('#dv2'); }, 3000);
     setTimeout(function () { apareceDesaparece('#dv2'); }, 4000);
     
});

function escondeDv(identificador) {
     //$(identificador).hide();
     //$(identificador).hide('slow');
     $(identificador).hide('fast');
}

function exibeDiv(identificador){

     $(identificador).show('slow');
}

function apareceDesaparece(identificador){

     $(identificador).toggle();
}

function addEvento(id, evento){

     $(id).bind(evento, ()=>{

          $('#dv3').toggle('fast');
     })
}
$(document).ready(function(){

     alert("ALERTA!");
});

//OU

$(function(){
     alert("Opa");
});

//Evitando conflito

let $j = jQuery.noConflict();

$j(function (){
     alert('$j');
});

jQuery(document).ready(function (){
     alert('funcionando nativamente');
})
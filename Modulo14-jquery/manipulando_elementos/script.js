$(function(){

     substitui();
     texto();
     find();
     atalho();
     input();
     depois();
     antes();
     ul();
     prepend_();
     remove();
});

function substitui(){

     let primeiraDiv = $('#teste');
     primeiraDiv.html("Novo Texto");
}

function texto(){

     let div = $('#teste2');
     div.text("Texto puro <strong>negrito</strong>");
}

function find(){

     let imagem = $('#teste3').find('img');
     imagem.attr('width', '100');
}

function atalho(){

     $('#teste3').find('img').width(300);
     $('#teste3').find('img').height(300);
}

function input(){

     let input = $('input');
     input.val("Value do input");

     //OR
     //$('input').attr('value', 'segundo valor inserifo via JQ');
}

function depois(){

     let input2 = $('input');
     input2.after("<div>texto qualquer<div>");
}

function antes(){

     let input = $('input');
     input.before('<div>Antes</div>');
}

function ul(){

     let ul = $('#001');
     ul.append('<li id="06">Iten 6</li>')
}

function prepend_(){

     $('#001').prepend("<li>Item 0</li>");
}

function remove(){

     $('.zerodois').remove();
}
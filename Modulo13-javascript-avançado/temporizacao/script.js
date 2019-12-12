function acao() {
     
     document.write('Executou....<br>');
}

setInterval(acao, 600000);

let definidoEmVariavel = setTimeout(acao, 3000);
clearTimeout(definidoEmVariavel);

let timer = setInterval(acao, 2000);
clearInterval(timer); //parar a execução


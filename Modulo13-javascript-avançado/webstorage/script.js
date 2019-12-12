if(typeof localStorage.nome3 == "undefined"){

     localStorage.nome3 = prompt("Qual seu Nome?");
}

let nome3 = localStorage.nome3;
document.getElementById("info3"). innerHTML = localStorage.nome3;

localStorage.setItem("nome", "Fabiano");
//ou
localStorage.nome2 = "Fabiano_";

localStorage.getItem('nome');
//ou
localStorage.nome2;

document.getElementById("info"). innerHTML = localStorage.getItem("nome");
document.getElementById("info2"). innerHTML = localStorage.nome2;

localStorage.removeItem('nome');
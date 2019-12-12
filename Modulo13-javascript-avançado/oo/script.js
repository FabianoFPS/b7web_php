//https://developer.mozilla.org/pt-BR/docs/Web/JavaScript/Reference/Classes


//declarações de funções
function Animal() {
     
     this.raca = "Cão";
     this.nome = "";
     this.idade = "";
     this.peso = "";
}

let lulu = new Animal();
let xuxu = new Animal();
console.log(lulu.raca);

lulu.raca = 'Gato';

//declarações de classes

class Retangulo {
     constructor(altura, largura) {
          this.altura = altura;
          this.largura = largura;
     }
}

const p = new Retangulo(2, 4);

document.write(p.altura+'<br>');
document.write(p.largura);


// sem nome
let Retangulo0 = class {
     constructor(altura, largura) {
       this.altura = altura; 
       this.largura = largura;
     }
   };

// nomeada
let RetanguloZ = class Retangulo2 {
     constructor(altura, largura) { 
       this.altura = altura;
       this.largura = largura;
     }
};

//Métodos Protótipos
class Retangulo3 {
     constructor(altura, largura) {
       this.altura = altura; this.largura = largura;
     }
   //Getter
     get area() {
         return this.calculaArea()  
     }  
   
     calculaArea() {  
         return this.altura * this.largura;  
     }
 }
 
 const quadrado = new Retangulo3(10, 10);
 
 console.log(quadrado.area);

 /*******************
* Métodos estáticos *
********************/
class Ponto {
     constructor(x, y) {
         this.x = x;
         this.y = y;
     }
 
     static distancia(a, b) {
         const dx = a.x - b.x;
         const dy = a.y - b.y;
 
         return Math.hypot(dx, dy);
     }
 }
 
 const p1 = new Ponto(5, 5);
 const p2 = new Ponto(10, 10);
 
 p1.distancia; //undefined
 p2.distancia; //undefined
 
 console.log(Ponto.distancia(p1, p2));
function AnimalZ(peso){

     this.peso = peso;
     
     this.fazerXix = function(){

          console.log("xixiiiiiiiiiiiiiiiiiiiiiiiiii");
     }

     this.comer = function(kg){

          for(var i=0;i<kg;i++){

               this.mastigar();
          }

          this.peso += kg;
          return 'gostoso';
     }

     this.mastigar = function(){

          console.log("Nhoc..");
     }
}

let lulu2 = new AnimalZ(10);
lulu2.fazerXix();


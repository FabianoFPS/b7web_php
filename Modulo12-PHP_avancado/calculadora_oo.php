<?php
class Calculadora{

     private $numeroInicial;

     /**
     * @param
     * @return
     */
     public function __construct(int $numero){
     
          $this->definirNumeroInicial($numero);
     }

     /**
     * @param
     * @return
     */
     protected function definirNumeroInicial(int $numeroInicial){
     
          $this->numeroInicial = $numeroInicial;
     }

     /**
     * @param
     * @return
     */
     public function somar(int $n1){
     
          $this->numeroInicial += $n1;
          return $this;
          //retorna o proprio objeto
     }

     public function subtrair(int $n1){
     
          $this->numeroInicial -= $n1;
          return $this;
          //retorna o proprio objeto
     }

     public function multiplicar(int $n1){
     
          $this->numeroInicial *= $n1;
          return $this;
          //retorna o proprio objeto
     }

     public function dividir(int $n1){
     
          $this->numeroInicial /= $n1;
          return $this;
          //retorna o proprio objeto
     }

     /**
     * @param
     * @return
     */
     public function resultado(){
     
          return $this->numeroInicial;
     }
}

$calc = new Calculadora(10);

$calc->somar(2)->subtrair(3)->multiplicar(5)->dividir(2);
echo $calc->resultado();



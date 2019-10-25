<?php
class Animal{
     public $nome;
     private $idade;
     protected $sobreNome;

     protected function dizOi(){
     
          echo "oi[*]";
     }

     public function falar(){
     
          $this->dizOi();
     }

     public function falar2(){
     
          $this->dizOi2();
     }

     private function dizOi2(){
     
          echo "<hr>oi[**]<hr>";
     }
}

class Cavalo extends Animal{
     private $quantidadePatas = 0;
     private $tipoPelo = "";
}

class Gato extends Animal{
     private $quantidadePatas = 0;
     private $miado;
}

$animal = new Animal();
//$animal->idade = 35;

$cavalo = new Cavalo();
$cavalo->nome = "Burrito";
$cavalo->idade = 30;
$cavalo->falar();
$cavalo->falar2();
//$cavalo->sobreNome = "Ruam";

echo $cavalo->idade;
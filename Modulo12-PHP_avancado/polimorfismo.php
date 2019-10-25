<?php
class Animal{

     public function getNome(){
     
          echo "getNome da clase Animal<br>";
     }
}

class Cachorro extends Animal{

     public function getNome(){
     
          echo "getNome da clase Cachorro<br>";
     }
}

$animal = new Animal();
$animal->getNome();

$cachorro = new Cachorro();
$cachorro->getNome();
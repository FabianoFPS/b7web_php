<?php
interface Animal {

     public function andar();
}

class Cachorro implements Animal{

     public function andar(){
     
          echo "andando";
     }
}

$cachorro = new Cachorro();
$cachorro->andar();
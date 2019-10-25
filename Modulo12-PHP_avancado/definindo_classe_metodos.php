<?php
class Pessoa {

     private $nome;
     public $nomePublico;
     private $idade;

     public function __construct($t){
     
          $this->idade = $t;
     }

     public function trocarNome(){

          conectarBancoDados();
     }

     public function latir(){
     
          echo 'auau';
     }
     private function conectarBancoDados(){
          
          //só pode ser usada de dentro da classe
     }
     
     protected function oi(){

          //poder ser usada pelas classes que extenderem a classe original
          
     }
     
     public function setNome(string $nome){
     
          $this->nome = $nome;
     }

     public function getNome(){
     
          return $this->nome;
     }

     public function setIdade(string $idade){
     
          $this->idade = $idade;
     }

     public function getIdade(){
     
          return $this->idade;
     }

}

$pessoaQueLate = new Pessoa(1550);
$pessoaQueLate->latir();

echo $pessoaQueLate->getIdade();
//Pessoa::latir(); //deprecated - não é função estática

$pessoaQueLate->nomePublico = "Lula";

$pessoaQueLate->setNome("Currupira");

echo $pessoaQueLate->getNome();


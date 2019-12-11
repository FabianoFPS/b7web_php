<?php
class Pessoa{

     private $nome;
     private $nascimento;

     /**
     * ...
     * @param String $nome
     * @param String $nascimento
     * @return
     */
     public function __construct(string $nome, string $nascimento){
     
          $this->nome = $nome;
          $this->nascimento = $nascimento;
     }

     /**
     * ...
     * @param
     * @return String
     */
     public function getNome(): string{
     
          return $this->nome;
     }

     /**
     * ...
     * @param
     * @return String
     */
    public function getIdade(): string{

          // $dataAtual = date("Y-m-d");

          $dataAtual = time();
          
          $montaDataNascimento = explode('/', $this->nascimento);
          $ano = $montaDataNascimento[2];
          $mes = $montaDataNascimento[1];
          $dia = $montaDataNascimento[0];
          //$dataNascimento = date( "Y-m-d", strtotime("$ano-$mes-$dia") );
          $dataNascimento = strtotime("$ano-$mes-$dia");
                    
          //$idade = date( "Y", strtotime("-$ano years") );



          $idade = date( "Y", ($dataAtual - $dataNascimento) ) - 1970;
          
          return $idade;
     }
}

$pessoa = new Pessoa('Pessoinha', '05/04/1992');
echo $pessoa->getNome();
echo '<br>';
echo $pessoa->getIdade();
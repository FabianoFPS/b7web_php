<?php
class Reservas {

     private $banco;

     /**
     * ...
     * @param
     * @return
     */
     public function __construct(){
     
          $this->banco = $this->conexao('projeto_reservas');
     }

     private function conexao (string $base){

          require_once '../BD.generico.class.php';
          return new BD($base);
     }

  /**
  * ...
  * @param
  * @return Array
  */
  public function getReservas($dataInicio, $dataFim){
  
      $sql = "SELECT *
             FROM reservas
             WHERE (NOT (    data_inicio > :data_fim 
                              OR   data_fim < :data_inicio));";

      $dados = array(':data_inicio' => $dataInicio,
                     ':data_fim'    => $dataFim);

      //print_r($dados);

      return $this->banco->execBDv2($sql, $dados);
  }

  /**
  * ...
  * @param Array $dados indices: carro, data_inicio, data_fim
  * @return Bool
  */
  public function verificaDisponibilidade(array $dados){
  
     $sql = "  SET @evita_erro = :pessoa;
               SELECT *
               FROM reservas
               WHERE     id_carro = :carro
               AND       (NOT (    data_inicio > :data_fim 
                              OR   data_fim < :data_inicio));";

     $resultado = $this->banco->execBDv2($sql, $dados);

     if( isset($resultado['info']) ){
          
          return false;
     }

     return true;
  }

  /**
  * ...
  * @param
  * @return Bool
  */
  public function reservar(array $dados){
  
     $sql = "INSERT INTO reservas (id_carro, data_inicio, data_fim, pessoa)
               VALUES (:carro, :data_inicio, :data_fim, :pessoa)";

     $resultado = $this->banco->execBDv2($sql, $dados);

     return $resultado['retorno'];
  }
}
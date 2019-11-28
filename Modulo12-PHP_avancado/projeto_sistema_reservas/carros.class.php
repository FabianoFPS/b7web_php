<?php
class Carro {
     
     private $banco = null;

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
     public function getCarros(){
     
          $sql = "SELECT *
                    FROM carros;";

          return $this->banco->exec2($sql);
     }
}
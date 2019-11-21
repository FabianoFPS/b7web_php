<?php
/**
 * Classe documentos
 */
class Documentos {

     private $banco = null;

     public function __construct(BD $banco){
     
          $this->banco = $banco;
     }

     /**
     * ...
     * @param
     * @return
     */
     public function getDocumentos(){
     
          $sql = "SELECT *
                    FROM dicumentos ;";

          return $this->banco->exec( $sql );
     }
}
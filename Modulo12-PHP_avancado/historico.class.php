<?php

class BD{

     private $pdo;

     public const SQL_i_ACAO = "   SET @ip = :ip;
                                   SET @acao = :acao;
                                   INSERT INTO `historico`
                                   (`ip`,
                                   `data_acao`,
                                   `acao`)
                                   VALUES
                                   (@ip,
                                   NOW(),
                                   @acao);";

     public function __construct(){
     
          try {
               $this->pdo = new PDO("mysql:dbname=projeto_logeventos;host=localhost", "adm", "374937");
               $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          } catch (PDOexception $exception){
               
               die( $exception->getMessage() );
               
          } 
          catch (\Throwable $th) {
          
               die( $th->getMessage() );
          }
     }

     /**
     * @param String $sql
     * @param Array $parametros
     * @return Array
     */
     public function execBD(string $sql, array $parametros){
          
          $resultado = array();

          $statement = $this->pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
          $resultado['retorno'] = $statement->execute( $parametros );

          while ($statement->rowCount() == 0 &&  $statement->nextRowset()){}
          
          if ($statement->rowCount() and $statement->columnCount() ) {
     
              $resultado = $statement->fetch();
          }
            
          $statement->closeCursor();
          return $resultado;
     }

     /**
     * @param
     * @return
     */
     public function getIdInsert(){
     
          return $this->pdo->lastInsertId();
     }
}

class Historico {

     private $bd;

     public function __construct(){

          $this->bd = new BD();
     }

     public function registrar(string $acao){

          $ip = $_SERVER['REMOTE_ADDR'];

          $this->bd->execBD(BD::SQL_i_ACAO, array(':ip'    => &$ip,
                                                  ':acao'   => &$acao));
          return $this->bd->getIdInsert();
     }
}
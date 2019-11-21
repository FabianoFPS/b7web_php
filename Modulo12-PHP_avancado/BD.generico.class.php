<?php
class BD{

     private $pdo;

     public const SQL = "";

     public function __construct(string $dbname){
     
          try {
               $this->pdo = new PDO("mysql:dbname=$dbname;host=localhost", "adm", "374937");
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
     
              $resultado = $statement->fetchAll();
          }
            
          $statement->closeCursor();
          return $resultado;
     }

     public function execBDv2(string $sql, array $parametros){
          
          $resultado = array();

          $statement = $this->pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
          $resultado['retorno'] = $statement->execute( $parametros );

          while ($statement->rowCount() == 0 &&  $statement->nextRowset()){}
          
          if ($statement->rowCount() and $statement->columnCount() ) {
     
               $resultado['info'] = $statement->fetchAll();
          }
            
          $statement->closeCursor();
          return $resultado;
     }

     public function exec(string $sql){
          
          $resultado = array();

          $statement = $this->pdo->prepare($sql);
          $resultado['retorno'] = $statement->execute();

          while ($statement->rowCount() == 0 &&  $statement->nextRowset()){}
          
          if ($statement->rowCount() and $statement->columnCount() ) {
     
              $resultado = $statement->fetchAll();
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
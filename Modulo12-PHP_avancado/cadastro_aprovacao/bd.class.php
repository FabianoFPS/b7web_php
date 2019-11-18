<?php

class BD{

     private $pdo;

     public const SQL_INSERT_USER = "SET @nome = :nome;
                                        SET @email = :email;
                                        
                                        INSERT INTO `cadastros`.`usuarios`
                                        (`nome`, `email`)
                                        VALUES (@nome, @email);";

     public const SQL_UPDATE_STATUS = "SET @md5 = :md5;
                                        UPDATE usuarios
                                        SET status = 1
                                        WHERE MD5(id) = @md5";

     public function __construct(){
     
          try {
               $this->pdo = new PDO("mysql:dbname=cadastros;host=localhost", "adm", "374937");
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
          $statement->execute( $parametros );

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
     public function gerIdInsert(){
     
          return $this->pdo->lastInsertId();
     }
}

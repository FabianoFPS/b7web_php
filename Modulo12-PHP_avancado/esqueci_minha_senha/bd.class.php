<?php

class BD{

     private $pdo;

     public const SQL_S_EMAIL = "SET @email = :email;
                                   SELECT *                              
                                   FROM usuarios
                                   WHERE email = @email;";

     public const SQL_I_TOKEN = "  SET @id_usuario = :id_usuario;
                                   SET @hash = :hash;
                                   SET @expirado_em = :expirado_em;
                                   INSERT INTO usuarios_token (id_usuario, hash, expirado_em)
                                   VALUES (@id_usuario,  @hash, @expirado_em); ";

     public const SQL_S_VERIFICA_TOKEN_DATA = "   SET @token = :token;
                                                  SELECT *
                                                  FROM usuarios_token
                                                  WHERE hash = @token 
                                                       AND used = 0
                                                       AND expirado_em > NOW();";

     public const SQL_U_ALTERA_SENHA = "SET @id = :id;
                                        SET @nova_senha = :nova_senha;
                                        UPDATE usuarios
                                        SET senha = @nova_senha
                                        WHERE id = @id;";

     public function __construct(){
     
          try {
               $this->pdo = new PDO("mysql:dbname=projeto_registroporconvite;host=localhost", "adm", "374937");
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
     public function gerIdInsert(){
     
          return $this->pdo->lastInsertId();
     }
}

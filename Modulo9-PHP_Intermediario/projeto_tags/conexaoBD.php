<?php
class ConexaoBancoDeDados {

     private $pdo;

     function __construct(array $parametros){

          $gerenciadorBancoDados = $parametros[0];
          $base = $parametros[1];
          $host = $parametros[2];
          $login = $parametros[3];
          $senha = $parametros[4];

          $dsn = "$gerenciadorBancoDados:dbname=$base;host=$host";

          try {
     
               $pdo = new PDO($dsn, $login, $senha);
               $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

               $this->pdo = $pdo;
          
          } catch (PDOException $exception) {
               
               $mensagemErroPDO = $exception->getMessage();
               echo "Excessão: $mensagemErroPDO.";
          }
     }

     function executaOperacao(string $scriptSql, array $parametros){

          try {
     

               $statement = $this->pdo->prepare($scriptSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
               $statement->execute($parametros);
     
               return $statement;
          
          } catch (PDOException $exception) {
               
               $mensagemErroPDO = $exception->getMessage();
               echo "Excessão: $mensagemErroPDO.";
          }
     }

     function consulta(string $scriptSql){

          try {
     
               $statement = $this->pdo->query($scriptSql);
     
               return $statement;
          
          } catch (PDOException $exception) {
               
               $mensagemErroPDO = $exception->getMessage();
               echo "Excessão: $mensagemErroPDO.";
          }
     }
}
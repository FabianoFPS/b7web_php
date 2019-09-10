<?php
require_once 'configPDOMySql.php';

if(isset($_GET['id']) && !empty($_GET['id'])){
     
     $id = addslashes($_GET['id']);
     $variaveis = array (':id' => &$id);

     $sql = "DELETE FROM usuarios WHERE id = :id ;";

     try {
          
          $statement = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
          $statement->execute($variaveis);

     } catch (PDOExcepction $exception) {
          
          $mensagemErroPDO = $exception->getMessage();
          echo "Excessão: $mensagemErroPDO.";
     }
}

header('Location: ControleUsuriosHTML.php');
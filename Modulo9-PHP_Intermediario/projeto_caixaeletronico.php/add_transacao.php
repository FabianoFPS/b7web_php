<?php
session_start();
require_once("config.php");

if (isset($_POST['botao']) && !empty($_POST['botao'])) {
     
     $id = $_SESSION['banco'];
     $tipo = $_POST['tipo'];
     $valor = str_replace(",", ".", $_POST['valor']);
     $valor = floatval($valor);

     $sql = "INSERT INTO historico (id_conta, tipo, valor, data_operacao) VALUES (:id_conta, :tipo, :valor, NOW() )";
     $variaveis = array(':id_conta'=>$id,
                         ':tipo'=>$tipo,
                         ':valor'=>$valor);
     echo ' - '.$id.' - ';
     print_r ($variaveis);

     try {
          
          $statement = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
          $statement->execute($variaveis);

          if ($tipo == '0') {
               
               $sql = "UPDATE contas SET saldo = saldo + :valor WHERE id = :id_conta ;";
  

          } else {
               
               $sql = "UPDATE contas SET saldo = saldo - :valor WHERE id = :id_conta ;";

          }
          $variaveis = array( ':id_conta'    =>$id,
                              ':valor'       =>$valor); 

          $statement = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
          $statement->execute($variaveis);

          header("Location: index.php");
          exit();

     } catch (PDOException $exception) {
          
          $mensagemErroPDO = $exception->getMessage();
          echo "Excessão: $mensagemErroPDO.";
     }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Document</title>
</head>
<body>
     <form action="" method="post">
          Tipo de transação: <br><br>
          <select name="tipo" id="">
               <option value="0">Depósito</option>
               <option value="1">Saque</option>
          </select>
          <br>
          <br>
          Valor: <br>
          <input type="text" name="valor" pattern="[0-9.,]{1,}" id="">
          <br>
          <br>
          <input type="submit" name="botao" value="Adicionar">
     </form>
     <br>
     <br>
     <a href="index.php"><< Voltar</a>
</body>
</html>
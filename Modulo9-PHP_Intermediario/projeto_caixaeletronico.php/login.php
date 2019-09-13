<?php
session_start();
require_once("config.php");
if (isset($_POST['agencia']) && !empty($_POST['agencia'])) {
     
     $agencia = addslashes( $_POST['agencia'] );
     $conta = addslashes( $_POST['conta'] );
     $senha = md5($_POST['senha']);

     $sql = "SELECT * FROM contas WHERE agencia = :agencia AND conta = :conta AND senha = :senha ;";
     $variaveis = array( ':agencia'=> $agencia,
                         ':conta'  => $conta,
                         ':senha'  => $senha);

     try {
     
          $statement = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
          $statement->execute($variaveis);

          if ($statement->rowCount()) {
               
               $dado = $statement->fetch();
               $_SESSION['banco'] = $dado['id'];
               header("Location: index.php");
               exit();
          }
     
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
     <title>Login</title>
</head>
<body>
     <form action="" method="post">
          Agencia: <br>
          <input type="text" name="agencia" id=""><br><br>
          Conta: <br>
          <input type="text" name="conta" id=""><br><br>
          Senha: <br>
          <input type="password" name="senha" id=""><br><br>
          <input type="submit" value="Entrar">
     </form>
</body>
</html>
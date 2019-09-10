<?php
session_start();

require_once 'configPDOMySql.php';

if(isset($_POST['email']) && !empty($_POST['email'])){

     $email = addslashes( $_POST['email'] );
     $senha = md5( $_POST['senha'] );

     $sql = "SELECT id, nome, email  FROM usuarios WHERE email = :email AND senha = :senha ; ";
     $variaveis = array (':email' => &$email,
                         ':senha' => &$senha);

     try {
          
          $statement = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
          $statement->execute($variaveis);

          if($statement->rowCount()){

               $dados = $statement->fetch();

               $_SESSION['id'] = $dados['id'];
               $_SESSION['nome'] = $dados['nome'];
               $_SESSION['email'] = $dados['email'];

               header("Location: sistema_login.php");
          }

     } catch (PDOExcepction $exception) {
          
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
     E-mail: <br>
     <input type="email" name="email" id=""> <br> <br>
     Senha: <br>
     <input type="password" name="senha" id=""> <br> <br>
     <input type="submit" value="Entrar">
     </form>
</body>
</html>
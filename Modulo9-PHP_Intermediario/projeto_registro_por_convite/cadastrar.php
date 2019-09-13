<?php
session_start();
require_once 'config.php';

if(!empty($_GET['codigo'])){

     $codigo = addslashes($_GET['codigo']);

     $sql = "SELECT * FROM usuarios WHERE codigo = :codigo";
     $variaveis = array(':codigo' => $codigo);

     try {

          $statement = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
          $statement->execute($variaveis);

          if (!$statement->rowCount()) {
               
               unset($_SESSION['logado']);
               header('location: login.php');
               exit();
          }

     } catch (PDOException $exception) {
          
          echo "Excessão:".$exception->getMessage();
     }

}else{

     header('location: login.php');
}

if(!empty($_POST['email'])){

     $email = addslashes($_POST['email']);
     $senha = md5($_POST['senha']);

     $sql = "SELECT * FROM usuarios WHERE email = :email ;";
     $variaveis = array(':email' => &$email);
    
     try {
          
          $statement = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
          $statement->execute($variaveis);

          if (!$statement->rowCount()) {
               
               $codigo = md5(time());
               $sql = "INSERT INTO usuarios (email, senha, codigo) VALUES (:email, :senha, :codigo)";
               $variaveis = array( ':email'  => &$email,
                                   ':senha'  => &$senha,
                                   ':codigo' => &$codigo);

               $statement = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
               $statement->execute($variaveis);

               unset($_SESSION['logado']);

               header("Location: index.php");
               exit();
          }

     } catch (PDOException $exception) {
          
          $mensagemErroPDO = $exception->getMessage();
          echo "Excessão: $mensagemErroPDO.";
     } catch (Exception $exception){

          echo "Excessão:".$exception->getMessage();
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
     <h3>
          Cadastrar
     </h3>

     <form action="" method="post">
          Email: 
          <br>
          <input type="email" name="email" id="">
          <br>
          <br>
          Senha: 
          <br>
          <input type="password" name="senha" id="">
          <br>
          <br>
          <input type="submit" value="Cadastrar">
     </form>

</body>
</html>
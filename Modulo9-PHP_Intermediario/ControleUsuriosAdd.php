<?php
require_once 'configPDOMySql.php';

/*
@na frente da função suprime o Warning
ou
error_reporting(E_WARNING);

*/


//if(@isset($_POST[nome]) && empty($_POST[nome])==false){
if(@isset($_POST[nome]) && !empty($_POST[nome])){
     $nome = @addslashes($_POST[nome]);
     $email = @addslashes($_POST[email]);
     $senha = @md5($_POST[senha]);
     
     $sql = "INSERT INTO usuarios SET nome = :nome, email = :email, senha = :senha ";

     $variaveis = array (':nome'   => $nome,
                         ':email'  => $email,
                         ':senha'  => $senha);

     try {
          
          $statement = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
          $statement->execute($variaveis);

     } catch (PDOExcepction $exception) {
          
          $mensagemErroPDO = $exception->getMessage();
          echo "Excessão: $mensagemErroPDO.";
     }

     header('Location: http://localhost/git/b7web_php/Modulo9-PHP_Intermediario/ControleUsuriosHTML.php');
     exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Adicionar usário</title>
</head>
<body>
     <form method="post">
          Nome: <br>
          <input type="text" name="nome" id="id_nome"> <br><br>
          E-mail: <br>
          <input type="email" name="email" id="id_email"> <br><br>
          Senha: <br>
          <input type="password" name="senha" id="id_senha"> <br><br>
          <input type="submit" value="Cadastrar">
     </form>
</body>
</html>
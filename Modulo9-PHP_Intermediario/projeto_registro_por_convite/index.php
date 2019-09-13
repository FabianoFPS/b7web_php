<?php
session_start();
require_once 'config.php';

if(empty($_SESSION['logado'])){

     header("Location: login.php");
     exit();
}

$id = addslashes($_SESSION['logado']);
$email = '';
$codigo = '';

$sql = "SELECT email, codigo FROM usuarios WHERE id = :id";
$variaveis = array(':id' => &$id);

$statement = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$statement->execute($variaveis);

if($statement->rowCount()){

     $info = $statement->fetch();
     $email = $info['email'];
     $codigo = $info['codigo'];
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Document</title>
</head>
<body>
     <h1>
          Área interna do Sistema
     </h1>
     
     <p>
          Usuário: <?php echo $email; ?> - <a href="sair.php">Sair</a>
     </p>

     <p>
          
          Link: <a href="http://localhost/git/b7web_php/Modulo9-PHP_Intermediario/projeto_registro_por_convite/cadastrar.php?codigo=<?php echo $codigo; ?>">Clique aqui!</a>
     </p>
</body>
</html>

<?php
session_start();
require 'config.php';

if(!empty($_POST['email'])) {
	$email = addslashes($_POST['email']);
	$senha = md5($_POST['senha']);

	$sql = "SELECT id FROM usuarios WHERE email = '$email' AND senha = '$senha'";
	$sql = $pdo->query($sql);

	if($sql->rowCount() > 0) {
		$info = $sql->fetch();

		$_SESSION['logado'] = $info['id'];
		header("Location: index.php");
		exit;
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
<form method="POST">
	E-mail:<br/>
	<input type="email" name="email" /><br/><br/>

	Senha:<br/>
	<input type="password" name="senha" /><br/><br/>

	<input type="submit" value="Entrar" /> <a href="cadastrar.php">Cadastrar</a>
</form>
</body>
</html>
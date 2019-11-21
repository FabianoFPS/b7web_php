<?php
session_start();

require_once '../BD.generico.class.php';
require_once 'usuarios.class.php';

try {
     
     $banco = new BD('projeto_permissão');

}catch (PDOException $exception) {
     $exception->getMessage();
}catch (\Throwable $th) {
     $th->getMessage();
}

$usuario = new Usuarios($banco);
$usuario->setUsuario($_SESSION['logado']);

if ( !$usuario->temPermissao('SECRET') ){

     header("Location: index.php");
     exit('Acesso negado');
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
     <h1>Página secreta</h1>
</body>
</html>
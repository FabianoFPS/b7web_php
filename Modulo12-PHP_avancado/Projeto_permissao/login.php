<?php
session_start();
require_once '../BD.generico.class.php';
require_once 'usuarios.class.php';

if( !empty($_POST['email']) and !empty($_POST['senha'])){

     $email = $_POST['email'];
     $senha = md5($_POST['senha']);

     try {
     
          $banco = new BD('projeto_permissão');
     
     }catch (PDOException $exception) {
          $exception->getMessage();
     }catch (\Throwable $th) {
          $th->getMessage();
     }

     $usuario = new Usuarios($banco);

     if( $usuario->fazerLogin($email, $senha) ){

          header("Location: index.php");
          exit();
     }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <meta name="description" content="Descrição">
     <meta name="author" content="Autor">
     <link rel="icon" href="logo.ico">
     <title>Document</title>
     <link rel="stylesheet" href="../../Modulo11-BootstrapV4/bootstrap-4.3.1-dist/css/bootstrap.min.css">
</head>
<body>
     <div class="container-fluid">
          <div class="row justify-content-center">
               <div class="col-3">
                    <form method="post" action="">
                         <div class="form-group">
                              <label for="input1">Email</label>
                              <input id="input1" class="form-control" type="email" name="email">
                         </div>
                         <div class="form-group">
                              <label for="input2">Senha</label>
                              <input id="input2" class="form-control" type="password" name="senha">
                         </div>
                         <button class="btn btn-dark" type="submit">Login</button>
                    </form>
               </div>
          </div>
     </div>
<script type="text/javascript" src="../../Modulo11-BootstrapV4/bootstrap-4.3.1-dist/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../../Modulo11-BootstrapV4/bootstrap-4.3.1-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
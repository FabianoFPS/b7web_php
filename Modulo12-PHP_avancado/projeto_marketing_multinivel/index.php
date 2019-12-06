<?php
session_start();
require_once 'config.php';

if ( empty($_SESSION['mmnlogin']) ) {
     
     header("Location: login.php");
     exit();
}
$id       = $_SESSION['mmnlogin'];
$nome     = $_SESSION['nome'];
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
     <div class="container">
          <div class="row">
               <div class="col">
                    <div>
                         <h1>Sistema de Marketing Multi Nivel</h1>
                         <h2><?php echo $nome; ?></h2>
                    </div> 
               </div>
          </div>
          <div class="row">
               <div class="col">
                    <a href="cadastro.php" class="btn btn-dark" >Cadastrar Novo Usuário</a>
               </div>
          </div>
          <br>
          <div class="row">
               <div class="col">
                    <a href="logout.php" class="btn btn-danger" >Sair</a>
               </div>
          </div>
     </div>
<script type="text/javascript" src="../../Modulo11-BootstrapV4/bootstrap-4.3.1-dist/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../../Modulo11-BootstrapV4/bootstrap-4.3.1-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
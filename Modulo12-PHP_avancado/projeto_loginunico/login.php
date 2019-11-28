<?php
session_start();

require_once '../BD.generico.class.php';

$_SESSION['lg'] = "";

if( isset($_POST['login']) and isset($_POST['senha']) ){

     $login = filter_input( INPUT_POST, 'login', FILTER_SANITIZE_EMAIL );
     $senha = filter_input( INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS );

     $bd = new BD('projeto_loginunico');

     $sql = "  SELECT *
               FROM usuarios
               WHERE     email = :login
               AND       senha = MD5(:senha);";

     $parametros = array(':login' => &$login,
                         ':senha' => &$senha);

     $retorno = $bd->execBDv2($sql, $parametros);

     //print_r($retorno);

     if ( isset($retorno['info'][0]['id']) ){

          $_SESSION['lg'] = $retorno['info'][0]['id'];
          $_SESSION['email'] = $retorno['info'][0]['email'];
          $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];

          $sql = "UPDATE usuarios SET ip = :ip WHERE id = :id;";

          $bd->execBDv2($sql, array(':id' => $_SESSION['lg'], ':ip' => $_SESSION['ip']));
          header("Location: index.php");
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
     <div class="container">
          <div class="row">
               <div class="col">
                    <form method="post" action="">
                         <div class="form-group">
                              <label for="my-input">E-mail</label>
                              <input id="my-input" class="form-control" type="email" name="login" required>
                         </div>
                         <div class="form-group">
                              <label for="my-input2">Senha</label>
                              <input id="my-input2" class="form-control" type="password" name="senha" required>
                         </div>
                         <button class="btn btn-success" type="submit">Login</button>
                    </form>
               </div>
          </div>          
     </div>
     <script type="text/javascript" src="../../Modulo11-BootstrapV4/bootstrap-4.3.1-dist/jquery-3.4.1.min.js"></script>
     <script type="text/javascript" src="../../Modulo11-BootstrapV4/bootstrap-4.3.1-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
session_start();

if( !empty($_POST['email']) ){

     $email = filter_input( INPUT_POST, 'email', FILTER_SANITIZE_EMAIL );
     $senha = filter_input( INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS );

     login($email, $senha);
}

function login (string $email, string $senha){

     require_once '../BD.generico.class.php';
     $bd = new BD('projeto_marketingmultinivel');

     $sql = "  SELECT *
               FROM      usuarios
               WHERE     email = :email
               AND       senha = MD5(:senha);";

     $parametros = array(':email' => &$email,
                         ':senha' => &$senha);

     $dados = $bd->execBDv2($sql, $parametros);

     //var_dump($dados);

     if ( isset($dados['info']) ) {
          
          $_SESSION['mmnlogin'] = $dados['info'][0]['id'];
          $_SESSION['nome'] = $dados['info'][0]['nome'];
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
               <div class="col-6">
                    <form method="post" action="">
                         <div class="form-group">
                              <label for="my-input">E-mail</label>
                              <input id="my-input" class="form-control" type="email" name="email">
                         </div>
                         <div class="form-group">
                              <label for="my-input2">Senha</label>
                              <input id="my-input2" class="form-control" type="password" name="senha">
                         </div>
                         <button class="btn btn-primary" type="submit">Login</button>     
                    </form>
               </div>
          </div>
     </div>
<script type="text/javascript" src="../../Modulo11-BootstrapV4/bootstrap-4.3.1-dist/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../../Modulo11-BootstrapV4/bootstrap-4.3.1-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
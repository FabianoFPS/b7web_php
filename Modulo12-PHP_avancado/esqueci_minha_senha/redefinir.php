<?php
if( !isset($_GET['token']) or empty($_GET['token']) ){
     exit('Acesso não permitido.');
}
require_once 'bd.class.php';

$token = $_GET['token'];
$bd = new BD();
$tokenConfirmado = $bd->execBD( BD::SQL_S_VERIFICA_TOKEN_DATA, array(':token' => &$token) );

if(empty($tokenConfirmado)){

     exit('Token Inválido');
}

if( isset($_POST['senha']) and !empty($_POST['senha']) ){
     
     $id = $tokenConfirmado['id_usuario'];
     $novaSenha = md5($_POST['senha']);

     $sucesso = $bd->execBD( BD::SQL_U_ALTERA_SENHA, array( ':id'          => &$id,
                                                            ':nova_senha'  => &$novaSenha) );

     if($sucesso['retorno']){

          exit('Senha alterada');
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
                              <label for="senha">Nova senha</label>
                              <input id="senha" class="form-control" type="password" name="senha">
                         </div>
                         <button class="btn btn-info" type="submit">Mudar senha</button>
                    </form>
               </div>
          </div>
     </div>
<script type="text/javascript" src="../../Modulo11-BootstrapV4/bootstrap-4.3.1-dist/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../../Modulo11-BootstrapV4/bootstrap-4.3.1-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


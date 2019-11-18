<?php
require_once 'bd.class.php';
$acessoRedefinir = "";

if( isset($_POST['email']) and !empty($_POST['email']) ){

     $email = $_POST['email'];
     $bd = new BD();
     $arrayRetorno = $bd->execBD( BD::SQL_S_EMAIL, array(':email' => &$email) );

     if( !empty($arrayRetorno) ){

          $id = $arrayRetorno['id'];
          $token = md5(time().rand(0,999).$id);
          $data = date( 'Y-m-d H:i:s', strtotime('+2 months') );
          //$data = date("Y-m-d H:i:s");

          $bd->execBD( BD::SQL_I_TOKEN, array(    ':id_usuario' => &$id,
                                                  ':hash' => &$token,
                                                  ':expirado_em' => &$data) );

          $url = "http://localhost/git/b7web_php/Modulo12-PHP_avancado/esqueci_minha_senha/redefinir.php?token=$token";
          $mensagem = "Clique no link para redefinir sua senha:";

          $acessoRedefinir = "<div class=\"alert alert-success\" role=\"alert\">
                                   $mensagem
                                   <br>
                                   <a href=\"$url\" target=\"_blank\" rel=\"noopener noreferrer\">$url</a>
                              </div>";
          $assunto = "Redifinir senha";
          $headers = 'From: seu_email@seusite.com.br'."\r\n".
                         'X-Mailer: PHP/'.phpversion();
          if(false){

               mail($email, $assunto, $mensagem, $headers);
          }
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
                              <label for="emaiç">Qual o seu e-mail?</label>
                              <input id="emaiç" class="form-control" type="email" name="email">
                         </div>
                         <button class="btn btn-info" type="submit">Enviar</button>
                    </form>
               </div>
          </div>
          <div class="row">
               <div class="col">
                    <?php echo $acessoRedefinir; ?>
               </div>
          </div>
     </div>
<script type="text/javascript" src="../../Modulo11-BootstrapV4/bootstrap-4.3.1-dist/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../../Modulo11-BootstrapV4/bootstrap-4.3.1-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
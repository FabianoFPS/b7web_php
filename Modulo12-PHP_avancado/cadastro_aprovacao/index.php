<?php
$mensagemConfirmacao = "";

if(  isset($_POST['nome']) and 
     isset($_POST['email']) and 
     !empty($_POST['nome']) and 
     !empty($_POST['email']) ){

          $nome  = addslashes( $_POST['nome'] );
          $email  = addslashes( $_POST['email'] );

          require_once 'bd.class.php';
          $bd = new BD();

          $bd->execBD(BD::SQL_INSERT_USER, array(':nome' => &$nome, ':email' => &$email ));
          $id = $bd->gerIdInsert();
          $md5 = md5($id);
          $link = "http://localhost/git/b7web_php/Modulo12-PHP_avancado/cadastro_aprovacao/confirmar.php?h=$md5";

          $assunto = "Confirme seu cadastro";
          $mensagem = "Clique no link abaixo para confirmar seu cadastro: \n\n $link";
          $headers = "From: ffpthai@gmail.com\r\nX-Mailer: PHP/".phpversion();
          //mail($email, $assunto, $mensagem, $headers);

          $mensagemConfirmacao = "<div class=\"alert alert-success\" role=\"alert\">OK! Confirme seu cadastro agora!
                                   <br>
                                   <a href=\"http://localhost/git/b7web_php/Modulo12-PHP_avancado/cadastro_aprovacao/confirmar.php?h=$md5\" 
                                        target=\"_blank\" 
                                        rel=\"noopener noreferrer\"
                                        >&raquo;CONFIRMAR&laquo; &reg &trade; &#8359; &ne; &le; &forall;</a>
                                   </div>";
          
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
               <div class="col-sm-5">
                    <form method="post" action="">
                         <div class="form-group">
                              <label for="nome">Nome</label>
                              <input id="nome" class="form-control" type="text" name="nome">
                         </div>
                         <div class="form-group">
                              <label for="email">Email</label>
                              <input id="email" class="form-control" type="email" name="email" required>
                         </div>
                         <button class="btn btn-success" type="submit">Cadastrar</button>
                    </form>
               </div>
          </div>
          <div class="row">
               <div class="col-sm">
                    <?php echo $mensagemConfirmacao; ?>
               </div>
          </div>
     </div>
<script type="text/javascript" src="../../Modulo11-BootstrapV4/bootstrap-4.3.1-dist/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../../Modulo11-BootstrapV4/bootstrap-4.3.1-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
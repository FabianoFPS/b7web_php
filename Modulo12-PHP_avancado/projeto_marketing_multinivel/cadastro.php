<?php
session_start();

if ( !empty($_POST['nome']) and !empty($_POST['email'])) {
     
     $email    = filter_input( INPUT_POST, 'email', FILTER_SANITIZE_EMAIL );
     $nome     = filter_input( INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS );
     $senha    = filter_input( INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS );
     $id_pai   = $_SESSION['mmnlogin'];

     require_once '../BD.generico.class.php';
     $bd = new BD('projeto_marketingmultinivel');

     $sql = "  SELECT    *
               FROM      usuarios
               WHERE     email = :email;";

     $existe = $bd->execBDv2( $sql, array(':email' => &$email) );

     if ( isset($existe['info']) ) header("Location: cadastro.php");
     
     $sql2 = " INSERT INTO usuarios (id_pai, nome, email, senha)
               VALUES (:id_pai, :nome, :email, MD5(:senha) );";

     $parametros2 = array(    ':id_pai' => &$id_pai,
                              ':nome'   => &$nome,
                              ':email' => &$email,
                              ':senha' => &$senha);

     $dados = $bd->execBDv2( $sql2, $parametros2 );

     if($dados['retorno']) header('Location: index.php');
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
                    <h1 class="h3 mb-3 font-weight-normal">Cadastrar Novo Usuário</h1>
                    <form method="post" action="">
                         <div class="form-group">
                              <label for="my-input">Nome</label>
                              <input id="my-input" class="form-control" type="text" name="nome">
                         </div>
                         <div class="form-group">
                              <label for="my-input2">Email</label>
                              <input id="my-input2" class="form-control" type="email" name="email">
                         </div>
                         <div class="form-group">
                              <label for="my-input3">Senha</label>
                              <input id="my-input3" class="form-control" type="password" name="senha">
                         </div>
                         <button class="btn btn-success" type="submit">Cadastrar</button>
                    </form>
               </div>
          </div>
     </div>
<script type="text/javascript" src="../../Modulo11-BootstrapV4/bootstrap-4.3.1-dist/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../../Modulo11-BootstrapV4/bootstrap-4.3.1-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
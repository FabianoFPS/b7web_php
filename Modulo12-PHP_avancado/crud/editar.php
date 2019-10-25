<?php
if( !isset($_GET['id']) or empty($_GET['id']) ){

     header("Location: index.php");
     exit;
}

require_once 'contato.class.php';

$contato = new Contato();
$info = $contato->getInfo($_GET['id']);

//var_dump($info);

if( !isset($info['id'])){

     header("Location: index.php");
     exit;
}

$id = $info['id'];
$nome = $info['nome'];
$email = $info['email'];

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <meta name="description" content="Descrição">
     <meta name="author" content="Autor">
     <link rel="icon" href="purzen_Skull.svg">
     <title>CRUD - incluir</title>
     <link rel="stylesheet" href="../../Modulo11-BootstrapV4/bootstrap-4.3.1-dist/css/bootstrap.min.css">
</head>
<body>
     <div class="container">
          <div class="row">
               <div class="col">
                    <h1>Editar</h1>
               </div>
          </div>
          <div class="row">
               <div class="col">
                    <form method="post" action="editar_submit.php">
                         <!-- <input type="hidden" name="id" value=""> -->
                         <div class="form-group">
                              <label for="nome">Nome</label>
                              <input id="nome" class="form-control" type="text" name="nome" value="<?php echo $nome ?>">
                         </div>
                         <div class="form-group">
                              <label for="email">E-mail</label>
                              <input id="email" class="form-control-plaintext" type="email" name="email" value="<?php echo $email ?>">
                         </div>
                         <button class="btn btn-success" type="submit">Salvar</button>
                    </form>
               </div>
          </div>
     </div>
<script type="text/javascript" src="../../Modulo11-BootstrapV4/bootstrap-4.3.1-dist/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../../Modulo11-BootstrapV4/bootstrap-4.3.1-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
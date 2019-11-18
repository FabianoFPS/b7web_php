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
     <link rel="stylesheet" href="../Modulo11-BootstrapV4/bootstrap-4.3.1-dist/css/bootstrap.min.css">
</head>
<body>
     <div class="container">
          <div class="row">
               <div class="col">
                    <h3>Digite e-mail ou cpf</h3>
                    <form method="post" action="">
                         <div class="form-group">
                              <label for="1">Text</label>
                              <input id="1" class="form-control" type="text" name="campo">
                         </div>
                         <button class="btn btn-primary" type="submit">Pesquisar</button>
                    </form>
               </div>
          </div>
          <div class="row">
               <div class="col">
                    <?php
                         if( !empty($_POST['campo']) ){

                              $ternoPesquisa = $_POST['campo'];

                              require_once 'BD.generico.class.php';

                              $banco = new BD('projeto_pesquisacolunas');

                              $sql = "SELECT *
                                        FROM usuarios
                                        WHERE (email = :termo_pesquisa) OR (cpf = :termo_pesquisa) OR (nome = :termo_pesquisa)";

                              $resultado = $banco->execBD($sql, array(':termo_pesquisa' => &$ternoPesquisa));
                              var_dump($resultado);
                              print_r($resultado);

                              if( isset($resultado[0]['nome'])){
                                   $nome = $resultado[0]['nome'];
                                   echo "<div>Nome: $nome</div>";
                              }
                                                            
                         }

                    ?>
               </div>
          </div>
     </div>
<script type="text/javascript" src="../Modulo11-BootstrapV4/bootstrap-4.3.1-dist/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../Modulo11-BootstrapV4/bootstrap-4.3.1-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
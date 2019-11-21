<?php
session_start();

if ( !isset($_SESSION['logado']) ){

     header("Location: login.php");
     exit("Deslogado!");
} 

require_once '../BD.generico.class.php';
require_once 'usuarios.class.php';
require_once 'documentos.class.php';

try {
     
     $banco = new BD('projeto_permissão');

}catch (PDOException $exception) {
     $exception->getMessage();
}catch (\Throwable $th) {
     $th->getMessage();
}

$usuario = new Usuarios($banco);
$usuario->setUsuario($_SESSION['logado']);
$permissoes = $usuario->getPermissoes();

$documentos = new Documentos($banco);
$lista = $documentos->getDocumentos();
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Permissões</title>
  </head>
  <body>
    <div class="container-fluid">
    <br>
         <div class="row">
               <div class="col-3">
               <?php
                    if ($usuario->temPermissao("ADD")) 
                         echo "<a href=\"adicionar.php\" target=\"_blank\" rel=\"noopener noreferrer\">Adicionar</a>";

                    if ( $usuario->temPermissao("SECRET") ){

                         echo "<br>
                              <a href=\"secreto.php\" target=\"_blank\" rel=\"noopener noreferrer\">Página Secreta</a>";

                    }
               ?>
               </div>
              <div class="col-9">
                  <table class="table table-light">
                       <thead class="thead-dark">
                            <tr>
                                 <th>Nome do Arquivo</th>
                                 <th>Ações</th>
                            </tr>
                       </thead>
                       <tbody>
                       <?php
                            foreach ($lista as $value) {

                                 $nome = $value['titulo'];

                                 echo " <tr>
                                             <td>$nome</td>
                                             <td>";
                                   if ($usuario->temPermissao("EDIT")) 
                                        echo "<a href=\"editar.php\" target=\"_blank\" rel=\"noopener noreferrer\">Editar</a>";
                                   if ($usuario->temPermissao("DEL")) 
                                        echo  "<a href=\"excluir.php\" target=\"_blank\" rel=\"noopener noreferrer\">Excluir</a>";
                                   echo "    </td>
                                        </tr>";
                            }
                       ?>   
                       </tbody>
                  </table>
              </div>
         </div>
    </div>
    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
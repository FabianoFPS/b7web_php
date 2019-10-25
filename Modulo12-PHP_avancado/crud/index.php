<?php
require_once 'contato.class.php';

$contato = new Contato();
$lista = $contato->getAll();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <meta name="description" content="B7WEB crud">
     <meta name="author" content="Fabiano">
     <link rel="icon" href="purzen_Skull.svg">
     <title>CRUD</title>
     <link rel="stylesheet" href="../../Modulo11-BootstrapV4/bootstrap-4.3.1-dist/css/bootstrap.min.css">
</head>
<body>
     <div class="container">
     <div class="row">
          <div class="col">
               <h1>Contatos</h1>
               <br>
               <a href="adicionar.php" class="btn btn-success">Adicionar</a>
               <table class="table table-bordered">
                    <thead>
                         <tr>
                              <!-- <th scope="col">id</th>
                              <th scope="col">nome</th>
                              <th scope="col">email</th>
                              <th scope="col">Ações</th> -->
                              <?php
                              foreach(range(0, $lista->columnCount() - 1) as $column_index)
                              {
                                   $coluna =  $lista->getColumnMeta($column_index);
                                   echo '<th scope="col">'.$coluna['name'].'</th>';
                              }
                              ?>
                             <th scope="col">Ações</th> 
                         </tr>
                    </thead>
                    <tbody>
                         <?php
                              foreach ($lista->fetchAll() as $key => $value) {
                                   
                                   echo '<tr>
                                             <th scope="row">'.$value['id'].'</th>
                                             <td>'.$value['nome'].'</td>
                                             <td>'.$value['email'].'</td>
                                             <td>
                                                  <a href="editar.php?id='.$value['id'].'" class="btn btn-primary">Editar</a>
                                                  <a href="excluir.php?id='.$value['id'].'" class="btn btn-danger">Excluir</a>
                                             </td>
                                        </tr>';
                              }
                         ?>
                    </tbody>
               </table>
          </div>
     </div>
     </div>
<script type="text/javascript" src="../../Modulo11-BootstrapV4/bootstrap-4.3.1-dist/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../../Modulo11-BootstrapV4/bootstrap-4.3.1-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

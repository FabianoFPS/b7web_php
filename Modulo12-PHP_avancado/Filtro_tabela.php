<?php
     $sexo =  (string) "";
     $masculinoSelected = "";
     $femininoSelected = "";
     $primeiraOpcao = "Selecione";

     if ( isset($_POST['sexo']) ){

          $sexo = (string) $_POST['sexo'];
          $primeiraOpcao = "Todos";
     } 

     switch ($sexo){
          case "0":
               $masculinoSelected = "selected";
          break;
          case "1":
               $femininoSelected = "selected";
          break;
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
     <link rel="stylesheet" href="../Modulo11-BootstrapV4/bootstrap-4.3.1-dist/css/bootstrap.min.css">
</head>
<body>
     <div class="container">
     <br>
          <div class="row">
               <div class="col">
                    <form method="post" action="">
                         <div class="form-group">
                              <div class="input-group mb-2 mr-sm-2">
                                   <div class="input-group-prepend">
                                        <div class="input-group-text">Sexo: </div>
                                   </div>
                                   <select id="my-select" class="form-control" name="sexo" for="sel">
                                        <option value="" ><?php echo $primeiraOpcao;      ?></option>
                                        <option value="0" <?php echo $masculinoSelected;  ?>>Maculino</option>
                                        <option value="1" <?php echo $femininoSelected;   ?>>Feminino</option>
                                   </select>
                                   <button class="btn btn-outline-success" type="submit">Filtrar</button>
                              </div>
                         </div>
                    </form>
                    <table class="table table-dark">
                         <thead>
                         <tr>
                              <th scope="col">Nome</th>
                              <th scope="col">Sexo</th>
                              <th scope="col">Idade</th>
                         </tr>
                         </thead>
                         <tbody>
                         <?php
                              require_once 'BD.generico.class.php';
                              $banco = new BD('projeto_filtrotabela');

                              $sql = "SELECT *
                                        FROM usuarios;";

                              $resultado = $banco->exec($sql);

                              foreach ($resultado as $value) {
                                   
                                   $tabNome = $value['nome'];
                                   $tabSexo = ( $value['sexo'] == 0)? 'Masculino' : 'Feminino' ;
                                   $tabIdade = $value['idade'];

                                   if ( $sexo != "" and $sexo != $value['sexo'] ) continue;

                                   echo "<tr>
                                             <td>$tabNome</td>
                                             <td>$tabSexo</td>
                                             <td>$tabIdade</td>
                                        </tr>";
                              }
                         ?>
                         </tbody>
                    </table>
               </div>
          </div>
     </div>
<script type="text/javascript" src="../Modulo11-BootstrapV4/bootstrap-4.3.1-dist/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../Modulo11-BootstrapV4/bootstrap-4.3.1-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
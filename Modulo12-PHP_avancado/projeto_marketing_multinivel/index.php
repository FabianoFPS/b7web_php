<?php
session_start();
require_once 'config.php';
$lista = '';

if ( empty($_SESSION['mmnlogin']) ) {
     
     header("Location: login.php");
     exit();
}
$id       = $_SESSION['mmnlogin'];
$nome     = $_SESSION['nome'];

$lista = listar($id);

function listar(string $id): string{

     $tabela = "<table class=\"table\">
                    <thead>
                         <tr>
                              <th scope=\"col\">#</th>
                              <th scope=\"col\">id_pai</th>
                              <th scope=\"col\">Cod. Patente</th>
                              <th scope=\"col\">Patente</th>
                              <th scope=\"col\">Nome</th>
                              <th scope=\"col\">Email</th>
                         </tr>
                    </thead>
                    <tbody>";

     $tabela .= itens($id, MAX_NIVEIS);

     $tabela .= "</tbody>
               </table>";

     return $tabela;
}

function itens(string $id, int $limite, string $sub = ''): string{

     $itens = '';

     require_once '../BD.generico.class.php';
     $bd = new BD('projeto_marketingmultinivel');
     
     $sql = "  SELECT    u.id,
                         u.id_pai,
                         u.patente,
                         u.nome,
                         u.email,
                         p.nome AS N_patente
               FROM      usuarios AS u
               LEFT JOIN patentes AS p
                    ON   p.id = u.patente
               WHERE     id_pai = :id;";

     $retorno = $bd->execBDv2($sql, array(':id' => $id));

     if ( !isset($retorno['info']) or !is_array($retorno['info']) ) return '';

     foreach ($retorno['info'] as $value) {

          $idIndividual  = $sub.$value['id'];
          $idPai         = $value['id_pai'];
          $patente       = $value['patente'];
          $nPatente       = $value['N_patente'];
          $nome          = $value['nome'];
          $email         = $value['email'];
          
          $itens .= "   <tr>
                              <th scope=\"row\">$idIndividual</th>
                              <td>$idPai</td>
                              <td>$patente</td>
                              <td>$nPatente</td>
                              <td>$nome</td>
                              <td><a href=\"mailto:$email\">$email</a></td>
                         </tr>";
          if($limite) $itens .= itens($value['id'], $limite-1, $sub.'... ');
     }

     return $itens;
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
                    <div>
                         <h1>Sistema de Marketing Multi Nivel</h1>
                         <h2><?php echo $nome; ?></h2>
                    </div> 
               </div>
          </div>
          <div class="row">
               <div class="col">
                    <a href="cadastro.php" class="btn btn-dark" >Cadastrar Novo Usuário</a>
               </div>
          </div>
          <br>
          <div class="row">
               <div class="col">
                    <a href="logout.php" class="btn btn-danger" >Sair</a>
               </div>
          </div>
          <div class="row">
               <div class="col">
                    <?php echo $lista; ?>
               </div>
          </div>
     </div>
<script type="text/javascript" src="../../Modulo11-BootstrapV4/bootstrap-4.3.1-dist/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../../Modulo11-BootstrapV4/bootstrap-4.3.1-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
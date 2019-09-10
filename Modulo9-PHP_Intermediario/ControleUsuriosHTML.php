<?php
require_once 'configPDOMySql.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Aula Exemplo Controle de Usuário</title>
</head>
<body>
     <a href="ControleUsuriosAdd.php">Adicionar Novo Usuário</a>
     <table border="0" width="100%">
          <tr>
               <th>ID</th>
               <th>Nome</th>
               <th>E-mail</th>
               <th>Senha</th>
               <th>Ações</th>
          </tr>
          <?php
          $sql = "SELECT id, nome, email, senha FROM usuarios ORDER BY id LIMIT 100";
          $PDOStatement = $pdo->query($sql);
          if($PDOStatement->rowCount() > 0){
               foreach ($PDOStatement->fetchAll() as $usuario) {
                    echo "<tr>";
                    echo "<td>".$usuario['id']."</td>";
                    echo "<td>".$usuario['nome']."</td>";
                    echo "<td>".$usuario['email']."</td>";
                    echo "<td>".$usuario['senha']."</td>";
                    echo '<td><a href="ControleUsuarioEditar.php?id='.$usuario['id'].'">Editar</a> - <a href="ControleUsuarioExcluir.php?id='.$usuario['id'].'">Excluir</a></td>';
                    echo "<tr>";
               }
          }
          ?>
     </table>
</body>
</html>
<?php
$dsn = "mysql:dbname=projeto_ordenar;host=localhost";
$dbuser = "adm";
$dbpass = "374937";

try {
     
     $pdo = new PDO($dsn, $dbuser, $dbpass);
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $exception) {
     
     $mensagemErroPDO = $exception->getMessage();
     echo "Excessão: $mensagemErroPDO.";
     exit();
}

if(isset($_GET['ordem']) && !empty($_GET['ordem'])){

     $ordem = $_GET['ordem'];
     //echo $ordem.'?';
     
     if($ordem == 'nome'){
          //$complementoSql = array( ':ordem' => "nome");
          $sql = "SELECT * FROM usuarios ORDER BY nome ;";

     }elseif($ordem == 'idade'){
          
          //$complementoSql = array( ':ordem' => "idade");

          $sql = "SELECT * FROM usuarios ORDER BY idade ;";

     }else {
          $sql = "SELECT * FROM usuarios ORDER BY nome ;";
     }
}else {
     
     //$complementoSql = array( ':ordem' => "idade");
     $ordem ='';
     $sql = "SELECT * FROM usuarios;";
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Projeto Ordenar</title>
</head>
<body>
     <form action="" method="get">
          <select name="ordem" id="" onchange="this.form.submit()">
               <option value=""></option>
               <option value="nome" <?php echo ($ordem == "nome")?'selected="selected"' :''?> >Nome</option>
               <option value="idade" <?php echo ($ordem == "idade")?'selected="selected"' :''?> >Idade</option>
          </select>
     </form>
     
     <table border="1" width="400">
          <tr>
               <th>Nome</th>
               <th>Idade</th>
          </tr>
          <?php


          //$sql = "SELECT * FROM usuarios ORDER BY :ordem ;";
          
          //$sql = "SELECT * FROM usuarios ORDER BY idade ;";

          //$complementoSql = array( ':ordem' => "idade");

          try {
               
               //$statement = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
               //$statement->execute($complementoSql);

               $statement = $pdo->query($sql);

               if($statement->rowCount()){
                    
                    foreach ($statement->fetchAll() as $usuario) {
                    
                         echo "<tr>";
                              echo "<td>";
                                   echo $usuario['nome'];
                              echo "</td>";

                              echo "<td>";
                                   echo $usuario['idade'];
                              echo "</td>";
                         echo "</tr>";
                    }
               }
          
          } catch (PDOException $exception) {
               
               $mensagemErroPDO = $exception->getMessage();
               echo "Excessão: $mensagemErroPDO.";
               exit();
          }
          ?>
     </table>
</body>
</html>
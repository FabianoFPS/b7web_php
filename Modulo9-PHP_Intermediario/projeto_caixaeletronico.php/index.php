<?php
session_start();
require_once 'config.php';

if (isset($_SESSION['banco']) && !empty(['banco'])) {
     
     $id = $_SESSION['banco'];

     $sql = "SELECT * FROM contas WHERE id = :id ;";
     $variaveis = array(':id' => $id);

     $statement = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
     $statement->execute($variaveis);

     if ($statement->rowCount()) {
          
          $info = $statement->fetch();
     }else{
          header('Location: login.php');
          exit();
     }

}else {
     header("Location: login.php");
     exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Caixa Eletrônico</title>
</head>
<body>
     <h1>Banco XYZ</h1>
     Titular:  <?php echo $info['titular']; ?> <br>
     Agência:  <?php echo $info['agencia']; ?><br>
     Conta:    <?php echo $info['conta']; ?> <br>
     Saldo:    <?php echo $info['saldo']; ?> <br>
     <a href="sair.php">Sair</a>
     <hr>
     <h3>Movimentação/Extrato.</h3>
     <br>

     <a href="add_transacao.php">Adiconar transação</a>
     <br>
     <br>
     <table width="400">
          <th>Data</th>
          <th>Valor</th>
          <?php
          $sql = "SELECT * FROM historico WHERE id_conta = :id";
          $variaveis = array(':id' => $id);

          try {

               $statement = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
               $statement->execute($variaveis);
          
               if ($statement->rowCount()) {
                    
                    foreach ($statement->fetchAll() as $key => $value) {
                         
                         $data = date('d/m/Y H:i', strtotime($value['data_operacao']));
                         $valor = $value['valor'];

                         $cor = ($value['tipo']) ? "red" : "green" ;

                         echo "<tr><td>$data</td><td><font color=\"$cor\">R\$$valor</font></td></tr>";
                    }
               }

          } catch (PDOExcepction $exception) {
               
               $mensagemErroPDO = $exception->getMessage();
               echo "Excessão: $mensagemErroPDO.";
          }
          ?>
     </table>
</body>
</html>
<?php
session_start();

if (isset($_POST['tipo']) && !empty($_POST['tipo'])) {
     
     $id = $_SESSION['banco'];
     $tipo = $_POST['tipo'];
     $valor = str_replace(",", ".", $_POST['tipo']);
     $valor = floatval($valor);

     $sql = "INSERT INTO historico (id_conta, tipo, valor, data_operacao) VALUES (:id_conta, :tipo, :valor, :data_operacao)";
     $variaveis = array(':id_conta'=>$id,
                         ':tipo'=>$tipo,
                         ':valor'=>$valor);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Document</title>
</head>
<body>
     <form action="" method="post">
          Tipo de transação: <br><br>
          <select name="tipo" id="">
               <option value="0">Depósito</option>
               <option value="1">Saque</option>
          </select>
          <br>
          <br>
          Valor: <br>
          <input type="text" name="valor" pattern="[0-9.,]{1,}" id="">
          <br>
          <br>
          <input type="submit" value="Adicionar">
     </form>
</body>
</html>
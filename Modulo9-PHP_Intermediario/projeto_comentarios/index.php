<?php
$dsn = "mysql:dbname=projeto_comentarios;host=localhost";
$dbuser = "adm";
$dbpass = "374937";

try {
     
     $pdo = new PDO($dsn, $dbuser, $dbpass);
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $exception) {
     
     $mensagemErroPDO = $exception->getMessage();
     echo "Excessão: $mensagemErroPDO.";
}

if(isset($_POST['nome']) && !empty($_POST['nome'])){

     $nome = $_POST['nome'];
     $mensagem = $_POST['mensagem'];

     $sql = "INSERT INTO mensagens (nome, msg, data_msg) VALUES (:nome, :mensagem, NOW())";
     $variaveis = array( ':nome'        => $nome,
                         ':mensagem'    => $mensagem);

     $statement = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
     $statement->execute($variaveis);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Sistema de Comentários</title>
</head>
<body>
     <fieldset>
          <form action="" method="post">
               Nome: 
               <br>
               <input type="text" name="nome" id="">
               <br>
               <br>
               Mensagem: 
               <br>
               <textarea name="mensagem" id="" cols="30" rows="10"></textarea>
               <br>
               <br>
               <input type="submit" value="Enviar Mensagem">
          </form>
     </fieldset>
     <br>
     <br>
<?php
$sql = "SELECT * FROM mensagens ORDER BY data_msg DESC";
$statement = $pdo->query($sql);

if($statement->rowCount()){

     foreach ($statement->fetchAll() as $key => $value) {
         
          $nome = $value['nome'];
          echo "<strong>$nome</strong><br>";
          
          echo $value['msg'].'<hr>';

     }
}else {
     echo 'Não há mensagem!';
}
?>     
</body>
</html>
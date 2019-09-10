<?php
$dsn = "mysql:dbname=blog;host=localhost";
$dbuser = "adm";
$dbpass = "374937";

try {
     $pdo = new PDO($dsn, $dbuser, $dbpass);

     $nome = "Fabiano";
     $id = 5;
     
     $sql = "UPDATE usuarios SET nome = :nome WHERE id = :id";

     $PDOStatement = $pdo->prepare($sql);

     $PDOStatement->bindValue(':nome', $nome);
     $PDOStatement->bindValue(':id', $id);
     $PDOStatement->execute();

     echo "Usuário tualizado com sucesso com sucesso!";

} catch (PDOExcepction $exception) {
     
     $mensagemErroPDO = $exception->getMessage();
     echo "Excessão: $mensagemErroPDO.";
}
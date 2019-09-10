<?php
$dsn = "mysql:dbname=blog;host=localhost";
$dbuser = "adm";
$dbpass = "374937";

try {
     $pdo = new PDO($dsn, $dbuser, $dbpass);
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     $sql = "UPDATE usuarios SET email = :email WHERE id = :id";

     $variaveis = array (':email'  => "testador@alterado.com",
                         ':id'     => "4");

     $resultado = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
     $resultado->execute($variaveis);
     
     echo "Usuário alterado com sucesso!";

} catch (PDOExcepction $exception) {
     
     $mensagemErroPDO = $exception->getMessage();
     echo "Excessão: $mensagemErroPDO.";
}
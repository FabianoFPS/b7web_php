<?php
$dsn = "mysql:dbname=blog;host=localhost";
$dbuser = "adm";
$dbpass = "374937";

try {
     $pdo = new PDO($dsn, $dbuser, $dbpass);
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     $nome = "Testador2";
     $email = "teste2@dominio.com";
     $senha = md5("1234");

     $sql = "INSERT INTO usuarios SET nome = :nome , email = :email , senha = :senha ;";

     $resultado = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
     $resultado->execute(array(':nome'  => &$nome,
                               ':email' => &$email,
                               ':senha' => &$senha));
     
     $ID_inserido = $pdo->lastInsertId();
     
     echo "ID do usuário inserido: $ID_inserido";

} catch (PDOExcepction $exception) {
     
     $mensagemErroPDO = $exception->getMessage();
     echo "Excessão: $mensagemErroPDO.";
}
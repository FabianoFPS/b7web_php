<?php
$dsn = "mysql:dbname=projeto_registroporconvite;host=localhost";
$dbuser = "adm";
$dbpass = "374937";

try {
     
     $pdo = new PDO($dsn, $dbuser, $dbpass);
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $exception) {
     
     $mensagemErroPDO = $exception->getMessage();
     echo "Excessão: $mensagemErroPDO.";
}
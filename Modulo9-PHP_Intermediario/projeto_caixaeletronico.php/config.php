<?php
$dbname = 'projeto_caixaeletronico';
$host = 'localhost';
$dsn = "mysql:dbname=$dbname;host=$host";
$dbuser = "adm";
$dbpass = "374937";

try {
     
     $pdo = new PDO($dsn, $dbuser, $dbpass);
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $exception) {
     
     $mensagemErroPDO = $exception->getMessage();
     echo "Excessão: $mensagemErroPDO.";
}
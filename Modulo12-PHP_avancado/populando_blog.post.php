<?php
$dsn = "mysql:dbname=blog;host=localhost";
$dbuser = "adm";
$dbpass = "374937";

try {
     $pdo = new PDO($dsn, $dbuser, $dbpass);
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     $sql = "INSERT INTO posts (titulo, data_criado, corpo, autor) VALUES (:titulo, :data_criado, :corpo, :autor);";

     $resultado = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

     
    // $ID_inserido = $pdo->lastInsertId();
     
     //echo "ID do usuário inserido: $ID_inserido";

} catch (PDOExcepction $exception) {
     
     $mensagemErroPDO = $exception->getMessage();
     echo "Excessão: $mensagemErroPDO.";
}

for ($ndex=0; $ndex < 1000; $ndex++) { 
     
     $titulo = "Título - $ndex";
     $data = date("Y-m-d H:i:s");
     $corpo = "Texto $ndex ...".md5(time());
     $autor = "Autor $ndex";

     $resultado->execute(array(':titulo'          => $titulo,
                               ':data_criado'     => $data,
                               ':corpo'           => $corpo,
                               ':autor'           => $autor));
}


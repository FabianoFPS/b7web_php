<?php
$dsn = "mysql:dbname=blog;host=localhost";
$dbuser = "adm";
$dbpass = "374937";

try {

     $pdo = new PDO($dsn, $dbuser, $dbpass);
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     $querySql = "SELECT id, nome, email, senha FROM usuarios /*WHERE email = 'buca@dominio.com'*/";
     $resultado = $pdo->query($querySql);

     if($resultado->rowCount()> 0) {
          foreach($resultado->fetchAll() as $usuario) {
               echo "ID: ".$usuario['id'].", Nome: ".$usuario['nome'].", E-mail: ".$usuario['email']."<br>";
          }
     }else {
          echo "Não há usuários cadastrados.";
     }

     echo "<hr>";

     $consultaMetodoPrepare = "SET @email = :e_mail;
                              SELECT *
                              FROM usuarios
                              WHERE email = @email;";

                              $consultaMetodoPrepare2 = "SELECT *
                              FROM usuarios
                              WHERE email =:e_mail;";

     $segundoResultado = $pdo->prepare($consultaMetodoPrepare, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
     $email = "juca@dominio.com";
     $segundoResultado->execute(array(':e_mail' => &$email ));



     while($segundoResultado->columnCount() === 0 && $segundoResultado->nextRowset()){}
          

          if($segundoResultado->rowCount() == 0) {
               echo "Não há usuários cadastrados.";
              exit();
          }

          if($segundoResultado->rowCount()> 0) {
               foreach($segundoResultado->fetchAll() as $usuarios) {
                    echo "Nome: ".$usuarios['nome'].", E-mail: ".$usuarios['email']."<br>";
               }
          }else {
               echo "Não há usuários cadastrados.";
          }

} catch(PDOExcepction $exception){

     $mensagemErroPDO = $exception->getMessage();
     echo "Excessão: $mensagemErroPDO.";
}
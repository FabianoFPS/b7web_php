<?php
     if(isset($_POST['nome'])){
          $nome = $_POST['nome'];
          file_put_contents("siada_anti_f5.txt", $nome.PHP_EOL, FILE_APPEND);
          //print_r ($_SERVER);
          $endereco = $_SERVER['HTTP_REFERER'];
          header("Location: $endereco");
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
          <input type="text" name="nome">
          <input type="submit" value="Enviar">
     </form>
</body>
</html>
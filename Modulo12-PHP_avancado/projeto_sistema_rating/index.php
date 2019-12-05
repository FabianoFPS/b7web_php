<?php
require_once '../BD.generico.class.php';

$html = "";
$bd = new BD('projeto_rating');
$sql = "SELECT * FROM filmes;";

$filmes = $bd->exec2($sql);

//var_dump($filmes);

if( isset($filmes['dados']) and is_array($filmes['dados']) ){

     $html = getFieldset($filmes['dados']);
}

function getFieldset(array $dados): string{

     $html = "";

     foreach ($dados as $value) {
          
          $titulo = $value['titulo'];
          $media = $value['media'];
          $id = $value['id'];
          $html .= "<fieldset>
                         <strong>$titulo</strong>
                         <br>
                         <a href=\"votar.php?id=$id&voto=1\"><img src=\"img/star.png\" height=\"20\"></a>
                         <a href=\"votar.php?id=$id&voto=2\"><img src=\"img/star.png\" height=\"20\"></a>
                         <a href=\"votar.php?id=$id&voto=3\"><img src=\"img/star.png\" height=\"20\"></a>
                         <a href=\"votar.php?id=$id&voto=4\"><img src=\"img/star.png\" height=\"20\"></a>
                         <a href=\"votar.php?id=$id&voto=5\"><img src=\"img/star.png\" height=\"20\"></a>
                         ($media)
                    </fieldset>";
     }

     return $html;
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
     <?php echo $html; ?>
</body>
</html>
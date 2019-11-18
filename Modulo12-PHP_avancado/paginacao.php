<?php

$dsn = "mysql:dbname=blog;host=localhost";
$dbuser = "adm";
$dbpass = "374937";

$registrosPorPaginas = 9;
$sqlTotalLinhas = "SELECT COUNT(id) AS 'total_linhas' FROM posts;";
$sqlConsulta = "SELECT * FROM posts ORDER BY id LIMIT :pagina_i, :pagina_f;";

$limiteInicial = 0;
$paginaAtual = 1;

if (isset($_GET['pagina']) and $_GET['pagina']>0 ) {
     
     $paginaAtual = addslashes($_GET['pagina']);
}



try {
     $pdo = new PDO($dsn, $dbuser, $dbpass);
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $exception){

     die( $exception->getMessage() );

} 
catch (\Throwable $th) {
     
     die( $th->getMessage() );
}

$totalRegistros = 0;
$resultado = $pdo->query($sqlTotalLinhas);
$resultado = $resultado->fetch();
$totalRegistros = $resultado['total_linhas'];

$paginas = ceil($totalRegistros / $registrosPorPaginas);

$limiteInicial = ($paginaAtual -1) * $registrosPorPaginas;

$parametros = array(':pagina_i' => $limiteInicial,
                    ':pagina_f' => $registrosPorPaginas);

// echo $paginas ;
// print_r($parametros);

$resultado = $pdo->prepare($sqlConsulta);
$resultado->bindParam(':pagina_i', $limiteInicial, PDO::PARAM_INT);
$resultado->bindParam(':pagina_f', $registrosPorPaginas, PDO::PARAM_INT);
$resultado->execute();



/**
* @param PDOStatement $st
* @return String
*/
function card(PDOStatement $st){

     $resultado = $st;
     $html = "";

     while ($resultado->rowCount() == 0 &&  $resultado->nextRowset()){}

          if (!$resultado->rowCount()){
          
               exit("Sem resultados ".$resultado->rowCount());
          }
          
          foreach ($resultado->fetchAll() as $key => $value) {
               
               /*
               $value['titulo']
               $value['corpo']
               */

               $titulo = $value['titulo'];
               $corpo = $value['corpo'];

              $html = $html."
                    <div class=\"col-md\">
                              <div class=\"card\" style=\"width: 18rem;\">
                                   <img class=\"card-img-top\" src=\"data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_16e13c40ce3%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_16e13c40ce3%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22107.18333435058594%22%20y%3D%2296.3%22%3E286x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E\" alt=\"Imagem de capa do card\">
                                   <div class=\"card-body\">
                                        <h5 class=\"card-title\">$titulo</h5>
                                        <p class=\"card-text\">$corpo</p>
                                        <a href=\"https://www.feevale.br/institucional/biblioteca\" target=\"_blank\" class=\"btn btn-primary\">Visitar</a>
                                   </div>
                              </div>  
                    </div>
              ";

          }

          return $html;
}

/**
* @param int $paginas
* @return String
*/
function paginacao(int $paginas){

     global $paginaAtual, $paginas;

     $html = "";

     $index = (($paginaAtual -6) < 5)? 0 : ($paginaAtual -6);
     $indexFim = (($paginaAtual +5) > $paginas)? $paginas : ($paginaAtual +5);

     for ($index; $index < $indexFim; $index++) { 
          
          $p = $index + 1;
          $active ="";

          if($p == $paginaAtual){

               $active = "active";
          }

          $html = $html."<li class=\"page-item $active\"><a class=\"page-link\" href=\"paginacao.php?pagina=$p\">$p</a></li>";
          //echo "<a href=\"paginacao.php?pagina=$p\">[$p] </a>";
     }

     return $html;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <meta name="description" content="Descrição">
     <meta name="author" content="Autor">
     <link rel="icon" href="purzen_Skull.svg">
     <title>Document</title>
     <link rel="stylesheet" href="../Modulo11-BootstrapV4/bootstrap-4.3.1-dist/css/bootstrap.min.css">
</head>
<body>
     <div class="container">
          <div class="row">
               <?php echo card($resultado); ?>
          </div>
     </div>
     <div class="container">
          <div class="row">
               <div class="col">
                    <footer class="my-5 pt-5 text-muted text-center text-small">
                         <nav aria-label="Navegação de página exemplo">
                              <ul class="pagination justify-content-center">
                                   <?php 
                                   echo ($paginaAtual > 1)? "<li class=\"page-item\"><a class=\"page-link\" href=\"paginacao.php?pagina=".($paginaAtual-1)."\">Anterior</a></li>":"";
                                   echo paginacao($paginas);
                                   echo ($paginaAtual < $paginas)?"<li class=\"page-item\"><a class=\"page-link\" href=\"paginacao.php?pagina=".($paginaAtual+1)."\">Próximo</a></li>" : "";
                                   ?>
                              </ul>
                         </nav>
                    </footer>
               </div>
          </div>
     </div>
<script type="text/javascript" src="../Modulo11-BootstrapV4/bootstrap-4.3.1-dist/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../Modulo11-BootstrapV4/bootstrap-4.3.1-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
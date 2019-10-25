<?php

$dsn = "mysql:dbname=blog;host=localhost";
$dbuser = "adm";
$dbpass = "374937";

$registrosPorPaginas = 10;
$sqlTotalLinhas = "SELECT COUNT(id) AS 'total_linhas' FROM posts;";
$sqlConsulta = "SELECT * FROM posts ORDER BY id LIMIT :pagina_i, :pagina_f;";

$limiteInicial = 0;
$paginaAtual = 1;

if (isset($_GET['pagina'])) {
     
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

while ($resultado->rowCount() == 0 &&  $resultado->nextRowset()){}

if (!$resultado->rowCount()){

     exit("Sem resultados ".$resultado->rowCount());
}

foreach ($resultado->fetchAll() as $key => $value) {
     
     echo $value['id'].' - '.$value['titulo'].'<br>';
}

echo "<hr>";

for ($index=0; $index < $paginas; $index++) { 
     
     $p = $index + 1;
     echo "<a href=\"paginacao.php?pagina=$p\">[$p] </a>";
}


// $resultado = $pdo->prepare($sqlConsulta, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
// $resultado->execute($parametros);

// $sqlConsulta = "SELECT * FROM posts ORDER BY id LIMIT $limiteInicial, $registrosPorPaginas;";
// $resultado = $pdo->query($sqlConsulta);


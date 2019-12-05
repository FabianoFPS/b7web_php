<?php
require_once '../BD.generico.class.php';

if( isset($_GET['id']) and isset($_GET['voto']) ){

     $id = filter_input( INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT );
     $voto = filter_input( INPUT_GET, 'voto', FILTER_SANITIZE_NUMBER_INT );

     if($voto > 5 or $voto < 1) exit("Nota inválida");

     $bd = new BD('projeto_rating');
     $sql = "INSERT INTO votos SET id_filme = :id_filme, nota = :nota;";
     $resposta = $bd->execBDv2($sql, array(  ':id_filme'    => $id,
                                             ':nota'        => $voto));

     if(!$resposta['retorno']) exit("Não foi possivel salvar a nota.");

     $sqlAtualizaNota = "UPDATE filmes 
                         SET media = (  SELECT AVG(nota)
                                        FROM votos
                                        WHERE votos.id_filme = filmes.id)
                         WHERE filmes.id = :id;";

     $resposta = $bd->execBDv2($sqlAtualizaNota, array(':id' => $id));

     if(!$resposta['retorno']) exit("Não foi possivel atuaizar a média.");

     header("Location: index.php");
     exit;
}
?>
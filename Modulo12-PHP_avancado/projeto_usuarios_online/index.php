<?php
require_once '../BD.generico.class.php';
$ip = $_SERVER['REMOTE_ADDR'];
$hora = date('H:i:s');

$conexao = new BD('projeto_usuariosonline');

$sql = "INSERT INTO acessos (ip, hora) VALUES (:ip, :hora);";
$parametros = array(':ip'     => $ip,
                    ':hora'   => $hora);

$conexao->execBDv2($sql, $parametros);

unset($conexao);

$conexao2 = new BD('projeto_usuariosonline');

$sql2 = " DELETE FROM acessos WHERE hora < :hora2;
          SELECT COUNT(ip) FROM acessos WHERE hora >= :hora2;";
$hora2 = date( 'H:i:s', strtotime("-1 minutes") );
$parametros = array(':hora2' =>  $hora2);

$online = $conexao2->execBDv2($sql2, $parametros);
echo $hora2.'<br>';
if (isset($online['info'])) echo $online['info'][0][0];
?>  
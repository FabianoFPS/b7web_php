<?php
if(  !isset($_GET['h']) or empty($_GET['h']) ){
     exit('Acesso inválido!');
}

require_once 'bd.class.php';
$db = new BD();
$h = $_GET['h'];

$db->execBD( BD::SQL_UPDATE_STATUS, array(':md5'=> $h) );

exit('Cadastro confirmado com sucesso!');

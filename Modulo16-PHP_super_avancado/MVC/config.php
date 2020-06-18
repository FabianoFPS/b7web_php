<?php
require_once 'environment.php';

$config = array();
if (ENVIRONMENT == 'development'){
    
    define('BASE_URL', 'https://localhost/b7web_php/Modulo16-PHP_super_avancado/MVC/');
    define ('PASTA_BASE', '/b7web_php/Modulo16-PHP_super_avancado/MVC/');
    $config['dbname'] = 'estrutura_mvc';
    $config['host'] = 'mysql';
    $config['user'] = 'root';
    $config['pass'] = 'root';

} else{
    define('BASE_URL', 'https://');
    $$config['dbname'] = '';
    $config['host'] = '';
    $config['user'] = '';
    $config['pass'] = '';
}

global $pdo;
try {
    $pdo = new PDO ("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['user'], $config['pass'] );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $exception) {
    
    $mensagemDeErro = $exception->getMessage();
    echo "Conexão com o Banco dde Dados falhou: $mensagemDeErro";
}
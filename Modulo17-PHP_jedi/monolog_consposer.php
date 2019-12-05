<?php
require_once "../vendor/autoload.php";
/*
https://packagist.org/
https://getcomposer.org/
*/

$log = new Monolog\Logger("nomeDoLogger");
$log->pushHandler( new Monolog\Handler\StreamHandler('log/monolog_composer.log', Monolog\Logger::WARNING) );

$log->alert("Aviso! Deu alg errado!");
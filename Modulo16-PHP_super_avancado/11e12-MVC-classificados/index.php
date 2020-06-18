<?php
session_start();
require_once 'config.php';
require_once 'config.inc.php';

//print_r($_SERVER);

// $opcao = explode( '/', str_replace(BASE_URL, '', $_SERVER['REQUEST_URI']) );
// print_r($opcao);

$request_uri = $_SERVER['REQUEST_URI'];

$url = str_replace(PASTA_BASE, '', $_SERVER['REQUEST_URI']);

$core = new Core($url);
$core->run();
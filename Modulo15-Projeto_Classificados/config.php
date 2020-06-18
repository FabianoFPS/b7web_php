<?php
session_start();

global $pdo;

try {
    $pdo = new PDO ("mysql:dbname=classificados;host=mysql", "root", "root" );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $exception) {
    
    $mensagemDeErro = $exception->getMessage();
    echo "Conexão com o Banco dde Dados falhou: $mensagemDeErro";
}
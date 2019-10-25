<?php
if ( !isset($_POST['nome']) or 
     !isset($_POST['email']) or 
     empty($_POST['nome']) or 
     empty($_POST['email']) ) {
     
     header("Location: adicionar.php");
     exit();
}

include_once 'contato.class.php';

$contato = new Contato();

if($contato->adicionar($_POST['email'], $_POST['nome'])){

     header("Location: index.php");
     exit;
}

echo "ERRO!";


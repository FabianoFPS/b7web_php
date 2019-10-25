<?php
if ( !isset($_POST['nome']) or 
     !isset($_POST['email']) or 
     empty($_POST['nome']) or 
     empty($_POST['email']) ) {
     
     header("Location: index.php");
     exit();
}

include_once 'contato.class.php';

$contato = new Contato();

if( $contato->editar( $_POST['nome'], $_POST['email'] ) ){

     header("Location: index.php");
     exit();
}

echo "ERRO!";
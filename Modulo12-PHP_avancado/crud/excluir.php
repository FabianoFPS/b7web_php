<?php
if( isset($_GET['id']) and !empty($_GET['id']) ){

     include_once 'contato.class.php';
     $contato = new Contato();
     $contato->excluirPorId($_GET['id']);
}

header("Location: index.php");
exit;
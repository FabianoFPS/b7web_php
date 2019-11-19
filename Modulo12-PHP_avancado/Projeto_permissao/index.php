<?php
session_start();

if ( !isset($_SESSION['logado']) ){

     header("Location: login.php");
     exit("Deslogado!");
} 

require_once '../BD.generico.class.php';

try {
     
     $banco = new BD('projeto_permissão');

}catch (PDOException $exception) {
     $exception->getMessage();
}catch (\Throwable $th) {
     $th->getMessage();
}

//var_dump($banco);

?>
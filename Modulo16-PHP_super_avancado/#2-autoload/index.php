<?php
spl_autoload_register(function ($class){

    require_once "./classes/$class.class.php";
});

$cavalo = new Cavalo();
$cavalo->falar();

$pessoa = new Pessoa();
$pessoa->falar();
<?php

require_once 'config.php';
require_once 'vendor/autoload.php';
require_once 'lib/Fabiano/Adapters/PhpMailerAdapter.php';

//use lib\Fabiano\Adapters\PhpMailerAdapter;
//Na conta do ggogle é preciso habilitar a permissão:
//https://myaccount.google.com/lesssecureapps?pli=1

$body = "<h1>Teste3</h1>";

$mail = new PhpMailerAdapter();
$mail->setFrom('ffpthai@gmail.com');
$mail->addAddress('ffpthai@gmail.com', 'Fabiano');
$mail->mountContent('teste3', $body);
$mail->send();
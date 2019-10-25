<?php
require_once 'classe_namespace.php';
require_once 'classe_namespace2.php';

$sobre = new \aplicacao\v1\Sobre();
echo $sobre->getVersao();
echo '<br>';

$sobre = new \aplicacao\v2\Sobre();
echo $sobre->getVersao();
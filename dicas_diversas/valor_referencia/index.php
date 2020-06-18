<?php
$variavelA = 10;
$variavelB = 30;

//recebe por valor
$valor = $variavelA;

$variavelA = 50;
echo "valor: $valor";
echo "<br>";
echo "variavelA: $variavelA";
echo '<hr>';

//recebe por referência.
$referencia = &$variavelB;

$variavelB = 80;

echo "referencia: $referencia";
echo "<br>";
echo "variavelB: $variavelB";

echo "<hr>";
function foo(&$var)
{
    $var++;
}

$a=5;
foo($a);
echo $a;
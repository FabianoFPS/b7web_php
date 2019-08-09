<?php
$nome = "Fabiano Francisco dos Passos Stoffel";

$explodido = explode(" ", $nome);

print_r($explodido);

$reverso = implode("_", $explodido);

echo '<br>'.$reverso;

$numero_formatado = number_format(8.4587455654, 2);

echo '<br>'.$numero_formatado;

$numero_formatado2 = number_format(784564848.4587455654, 2);

echo '<br>'.$numero_formatado2;

$numero_formatado3 = number_format(784564848.4587455654, 2, ',', '.');

echo '<br>'.$numero_formatado3;

$texto = 'O rato roeu a roupa';
$string = str_replace('roeu', 'mordeu', $texto);

echo '<br>'.$string;

echo '<br>'.strtolower("FABIANO FRANCISCO DOS PASSOS STOFFEL");

echo '<br>'.strtoupper("fabiano francisco dos passos stoffel");

echo '<br>'.substr($texto, 0, 6);

$parametro = 'francisco';

echo '<br>'.ucfirst($parametro);

$parametro2 = 'fabiano francisco dos passos stoffel';

echo '<br>'.ucwords($parametro2);
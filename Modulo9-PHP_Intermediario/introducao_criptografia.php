<?php
$nome = 'Fabiano';
$nome_criptografado = md5($nome);

echo "Nome original: $nome, Nome criptografado: $nome_criptografado.";

echo "<hr>";

$nome64 = base64_encode($nome);
echo "Na base 64: $nome64";

echo "<br>Decode 64: ".base64_decode($nome64);
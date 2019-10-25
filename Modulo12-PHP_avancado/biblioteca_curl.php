<?php
$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, "http://www.checkitout.com.br/wb/pingpong");
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, "nome=fabiano&idade=10");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// curl_setopt($curl, CURLOPT_URL, "http://www.anpad.org.br/login.php");
// curl_setopt($curl, CURLOPT_POST, true);
// curl_setopt($curl, CURLOPT_POSTFIELDS, "f_cpf_log=91693531000162&f_senha_log=gusmao");
// curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$resposta = curl_exec($curl);
curl_close($curl);

print_r($resposta);
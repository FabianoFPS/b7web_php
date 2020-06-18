<?php
$senha = 'qwertyuiopasdfghj789654123mnbvcxz';

$senhaCriptografada = password_hash($senha, PASSWORD_BCRYPT, ['cost' => 14]);

echo $senhaCriptografada;
echo '<br>';
echo password_verify($senha, '$2y$10$e2nEGeSD0/yOeBC1nrG/yOWfCbcGF7nSp42..3VcgnT4Uogh7qohy');
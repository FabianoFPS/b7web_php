<?php
$array = array(
     "nome"    => "Fabiano",
     "idade"   => 35,
     "cidade"  => "Novo Hamburgo",
     "pais"    => "Brazil",
     "Ultima_palavra" => "Zzz",
     "Primeira_palavra" => "Aaa"
);

asort($array);
print_r($array);
echo '<hr>';

arsort($array);
print_r($array);
echo '<hr>';

$array_key = array_keys($array);

print_r($array_key);
echo '<hr>';
print_r(array_pop($array));
echo '<br>';
print_r($array);
echo '<hr>';
print_r(array_shift($array));
echo '<br>';
print_r($array);

echo '<hr>';
echo "Total de registro no array: ".count($array);

echo "<hr>";

if(in_array("Fabiano", $array)){
     echo "--! in_array !--";
}

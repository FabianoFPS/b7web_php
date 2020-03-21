<?php

echo '<a href="https://pensandonaweb.com.br/o-que-ha-de-novo-no-php-7-4/" target="_blank" rel="noopener noreferrer">
     https://pensandonaweb.com.br/o-que-ha-de-novo-no-php-7-4/     
     </a><br><br>';

/******************************
* propriedades tipadas
*******************************/
class user{

     public int $id;
     public string $nome;
     private bool $isAdmin = false;
}

/******************************
* Arrow functions
*******************************/

$numbers = [1 ,2 ,3 ,4 ,5 ];
$outroExemplo = [40, 33, 35];
$factor = 2;

// deve-se deixar claro quais variáveis do escopo
// externo a função terá acesso através de `use`

$newNumbers = array_map(function ($i) use ($factor){
     return $i * $factor;
}, $numbers);

print_r($newNumbers);

$newNumbers = array_map(function ($i) use ($factor){
     return $i * $factor;
}, $outroExemplo);

echo '<br>';
print_r($newNumbers);

echo '<hr>';

$newNumbers = array_map( fn($cadaElementoDoArray) => $cadaElementoDoArray * $factor,  $numbers);
print_r($newNumbers);

echo '<br>';
$newNumbers = array_map( fn($cadaElementoDoArray) => $cadaElementoDoArray * $factor,  $outroExemplo);
print_r($newNumbers);

/*********************************
 * Spread Operator em Arrays
 ********************************/

 function sum ($a, $b){

     return $a + $b;
 }

 $numbers = [3, 5];

 echo '<hr>';
 echo sum( ...$numbers );

 $someNumber = [2, 3, 4];
 
 $numbers = [1, ...$someNumber, 5];
 echo '<br>';
 print_r( $numbers );

 $someNames = ['Bob', 'Carol'];
 $names = ['Alice', ...$someNames, 'Daniel', 'Elisa'];
 echo '<br>';
 print_r($names);

 /*************************
  *  null coalescing ??
  ************************/

  // verifica se a variável foi definida utilizando a função isset

  //$data['name'] = "Nome definido";

  $name = isset( $data['name']) ? $data['name'] : 'anonymous';
  echo "<hr> $name";

  // ??

$name = $data['name'] ?? 'anonymous';
echo "<br> $name";

// verifica se uma variável está definida e não é nula e atribui seu valor
// para si própria e, caso contrário, atribui um valor padrão

//$data['comments']['userName'] = "UsuarioDeComentário";

$data['comments']['userName'] = $data['comments']['userName'] ?? 'anonymous';

echo '<br>';
print_r($data);

$data['comments']['userName'] ??= 'anonymous';

echo '<br>';
print_r($data);
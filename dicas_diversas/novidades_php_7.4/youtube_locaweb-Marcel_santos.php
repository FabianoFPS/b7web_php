<?php
declare( strict_types=1 ); //conversão automatica desativada

class User {

     /**
     * @var int $id
     */
     private $id;

     public function getId(): int{
     
          return $this->id;
     }

     //7.4 - propiedade tipada
     public int $id_;

     public int $age;
     //classes
     protected Address $adress;
     public Address $adress_;
     //Pode ser null "?"
     private ?Passport $passport;
     public ?Passport $passport_;
}

class Address {}
class Passport {}

$user = new User();
$user->adress_ = new Address();
//$user->adress_ = null; / ERRO
var_dump($user->adress_);

$user->passport_ = null;
var_dump($user->passport_);

class Example {

     public static iterable $staticProp;
     var bool $flag;
     //Nullable
     public string $str = "foo";
     public ?string $nullableStr = null;
}

class Point {

     public float   $x,
                    $y;

     public int $a;
     public int $b;
}

class Test {

     public int $val;
}

$test = new Test;

if(false)
     $test->val = "42"; //retorna erro de tipo - declare( strict_types=1 )

class User_ {

     //propiedade nulas por padrão
     public $id;
     public $name;
}

$user_ = new User_;
var_dump($user_);

class User__ {

     //Tipando é obrigatório definir que poe ser null.
     //Por padrão as variaveis são uninitialized
     public int $id;
     public ?string $name;
}

$user__ = new User__;
var_dump($user__);
 
if(false)
     var_dump($user__->id); //Leitura de variaveis no estado "uninitialized" gera erro de tipo

$add = function ($x, $y) {

     return $x + $y;
};
echo $add(1, 3);
echo '<br>';

$add_ = fn ($x, $y) => $x + $y;

echo $add_(1, 3);

$variavel_fora_escopo = 3;

$fn1 = fn($x) => $x + $variavel_fora_escopo;

$fn2 = function ($x) use ($variavel_fora_escopo){
     
     return $x + $variavel_fora_escopo;
};

echo ('<br>');
echo $fn1(3);
echo ('<br>');
echo $fn2(3);

$z_ = 1;

$fn = fn($x_) => fn ($y_) => $x_ * $y_ + $z_;

echo '<br>';
echo $fn(2)(4);

var_dump( $fn(2)(3) );

$tipaParametro           = fn (array $p_array) => $x;
$tipaRetorno             = fn (): int => $x;
$valorPadrao             = fn ($valorPadrao = 42) => $x;
$varivelPorReferencia    = fn (&$z_) => $x;
$retornoPorReferencia    = fn& ($parametro) => $x;
$argumentUnpack          = fn ($x, ...$rest) => $rest;

class Collection {

     public function from( $parametro ){
          return $this;
     }
     public function map( $parametro ){
          return $this;
     }
     public function reduce( $parametro, $p_2 ){
          return $this;
     }
}

$collection = new Collection;

$result = $collection->from([1, 2])
     -> map(function ($v){
          return $v * 2;
     })
     ->reduce(function ($tmp, $v){
          return $tmp + $v;
     }, 0);

var_dump($result);

$result_ = $collection->from([1,2])
     ->map(fn($v) => $v * 2)
     ->reduce(fn($tmp, $v) => $tmp + $v, 0);

var_dump($result_);

function sum($a, $b){
     return $a + $b;
}

$numbers = [3, 5];

echo '<br>'.sum( ...$numbers ).'<br>';

$someNumbers = [2, 3, 4];
$numbers = [1, ...$someNumbers, 5];
print_r($numbers);

/****************************************
* OPERADOR DE ATRIBUIÇÃO null coalescing
*****************************************/
//$data['name'] = 'Fabiano';

$name = isset($data['name']) ? $data['name'] : 'anonymous';
echo "<br>$name<br>";

//null coalescing
$name = $data['name'] ?? 'anonymous';
echo "$name<br>";

//$data['comments']['name'] = 'Rui Barbosa';
// se não for null  recebe o primeiro valor ($data['comments']['name']), sendo null recebe o segundo (anonymous)
$data['comments']['name'] = $data['comments']['name'] ?? 'anonymous';

//se form null ou não exixtir recebe o valor...
$data['comments']['name'] ??= 'anonymous';

var_dump($data['comments']['name']);

//Numeric literal saparator

$numero = 1000000000; //1 Bilhão
$disonto = 13500; //quanto?

$umBilhao = 1_000_000_000;
$testValue = 10_925_284.88;
$discount = 135_00; //U$ 135, stored as cents

echo "<br>".$umBilhao*2;

/*
     FFI ou foreign
     funtion interface

$ffi = FFI::cdef('int abs(int j);', 'libc.so.6');
var_dump( $ffi-abs(-42) );

* biblioteca libc.so.6 comum no linux
*/

<?php
$stringJson = '{"PHP Tags aberto":{
     "prefix": "php:aberto",
     "body": [
          "<?php",
          "$1"
     ],
     "description": "Insere tags php estruturado sem fechamento"}}';

var_dump( json_decode($stringJson, $assoc = true));

$json = '{"a":1,"b":2,"c":3,"d":4,"e":5}';

var_dump( json_decode($json));

$json = '{"prefix": ["php:aberto", "segundo valor"] , "body": "<?php \n \t $1" }';

var_dump( json_decode($json, $assoc = true));

$jsonTeste = '{
                    "Ser HUmano": 
                    {
                         "Nome" : "Fabiano", 
                         "idade" : "humano",
                         "Idade" : 100
                    }
               }';

var_dump( json_decode($jsonTeste));


$array = array('lugar'=>array('local'=>'RS - Novo Hambirgo', 'Habitavel'=>'Sim'));

echo json_encode($array);
// print
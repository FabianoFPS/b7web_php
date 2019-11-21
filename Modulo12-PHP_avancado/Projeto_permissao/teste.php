<?php
$arrayFunc = array("func1" => function($nome){
                                   echo "olha eu aqui $nome <br>";
                              },
                   "func2" => function(string $outroNome){
                                   echo "Não estou mais aqui $outroNome <br>";
                              });

 $arrayFunc['func1']('fabiano');
 $arrayFunc['func2']('fabiano');

 /*OU*/

 $executar = $arrayFunc['func1'];
 $executar('Maria');

 $executar = $arrayFunc['func2'];
 $executar('Maria');
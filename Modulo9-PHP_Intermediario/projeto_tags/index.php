<?php
require_once 'manipulaBaseTags.php';

$baseTags = new ManipulaBaseTags();

$statement = $baseTags->getCaracteristicas();

if ($statement->rowCount()) {
     
     $lista = $statement->fetchAll();

     $caracteristica = array();

     foreach ($lista as $key => $value) {
          
          $palavras = explode(',', $value['caracteristicas']);

          foreach ($palavras as $key => $value) {
              
               $palavra = trim($value);

               if (isset($caracteristica[$palavra])) {
                    
                    $caracteristica[$palavra]++;
               }else{
                    $caracteristica[$palavra] = 1;
               }
          }
     }

     arsort($caracteristica);
     echo '<pre>';
     print_r($caracteristica);
     echo max($caracteristica);

     echo '<hr>';

     $contagens =array_values($caracteristica);
     print_r($contagens);
     echo max($contagens);
     echo '</pre>';

     $maior = max($caracteristica);

     $tamanhos = array(11, 15, 20 , 30);

     foreach ($caracteristica as $key => $value) {
          
          //echo $key."<br>";

          $numero = $value / $maior;

          //echo $numero."<br>";

          $h = ceil($numero * count($tamanhos));
          $tamanho = $tamanhos[$h-1];
          echo "<p style='font-size: $tamanho"."px'>$key ($value)</p>";
     }
}
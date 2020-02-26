<?php

spl_autoload_register( function ($class){

     $diretorioClasses = ['classes', 'core'];

     $indexDiretorio = null;

     foreach ($diretorioClasses as $diretorioNome) {

          $caminho = __DIR__ . DIRECTORY_SEPARATOR . $diretorioNome . DIRECTORY_SEPARATOR . $class . ".class.php";
          
          if (!$indexDiretorio && file_exists( $caminho)) {
               
                include_once ($caminho);
                $indexDiretorio = true;
          }
     }
});
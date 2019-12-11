<?php
date_default_timezone_set('America/Bahia');
$t = '2019-10-10 09:31:00';
$data = date('d/m/Y H:i:s e T', strtotime($t));

echo $data.'<br>foi há '.Tempo::diferenca($t).' atrás';
// echo date('d/m/Y H:i:s e T', strtotime('-1 hour'));
// echo date('d/m/Y H:i:s e T');
// echo '<br><br><br><br>';

// echo Tempo::diferenca($t);
// echo '<br>';
// echo (24*60)*60;

$variavel  = (string) 2;

class Tempo {

     public static function diferenca(string $tmp): string{

          $agora = time();
          //echo date('d/m/Y H:i:s', $agora );
          $comparar = strtotime($tmp);
          

          //$diferenca  = (string) $agora - $comparar ;
          $diferenca  = $agora - $comparar ;

          if($diferenca < 60){

               $string = (string) $diferenca;
               return "$string segundo(s)";

          }else if( ($diferenca/60) < 60){

               $string = (string) round( ($diferenca/60) );
               return "$string minuto(s)";

          }else if( (($diferenca/60)/60) < 24){

               $string = (string) round( (($diferenca/60)/60) );
               return "$string hora(s)";

          }else {

               $string = (string) round( ((($diferenca/60)/60)/24) );
               return "$string dia(s)";
          }

          return '';          
     }
}

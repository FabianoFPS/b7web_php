<?php
if (isset($_GET['operacao']) && !empty($_GET['operacao'])) {
     
     $n1 = floatval( $_GET['n1'] );
     $n2 = floatval( $_GET['n2'] );
     $operacao = $_GET['operacao'];
     $resultado;

     switch ($operacao) {
          case '+':
               $resultado = $n1 + $n2;
               break;

          case '-':
               $resultado = $n1 - $n2;
               break;
          
          case '*':
               $resultado = $n1 * $n2;
               break;

          case '/':
               $resultado = $n1 / $n2;
               break;          
          default:
               exit("Operador indefinido ou inválido");
               break;
     }

     echo "$n1 $operacao $n2 = $resultado";
}
exit();
<?php
$n1 = intval(@$_POST['numero_1']) ?? 0;
$n2 = intval(@$_POST['numero_2']) ?? 0;
echo $n1+$n2;
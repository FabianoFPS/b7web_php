<?php
//https://www.php.net/manual/pt_BR/ref.math.php
echo abs(-10);
echo "<br>";

echo round(2.8);
echo '<br>';

echo round(2.3);
echo '<br>';

echo ceil(2.3);//aredonda pra cima
echo " <br> ";

echo 'floor: '.floor(2.9);
echo "<br>";

echo rand(10,50);

$diasSemana = ['domingo', 'segunda-feira', 'terça-feira', 'quarta-feira', 'quinta-feira', 'sexta-feira', 'sabado'];
echo "<br>";

echo $diasSemana[rand(0,6)];
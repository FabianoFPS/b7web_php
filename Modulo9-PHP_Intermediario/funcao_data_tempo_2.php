<?php
//https://www.php.net/manual/pt_BR/ref.datetime.php
echo time();
echo "<br>";

echo mktime(24);
echo "<br>";

echo strtotime("now");
echo "<br>";

$timeStemp = strtotime("+1 day");
echo $timeStemp;
echo "<br>";

echo date("d/m/Y", $timeStemp);
<?php

//$arquivo =  $argv[1];
$arquivo = $_GET['arquivo'];

echo $arquivo;

list($larguraOriginal, $alturaOriginal) = getimagesize($arquivo);

$larguraAltura = ($larguraOriginal > $alturaOriginal )? $larguraOriginal: $alturaOriginal;



$imageQuadrada = imagecreatetruecolor($larguraAltura, $larguraAltura);
$branco = imagecolorallocate($imageQuadrada, 255, 255, 255);
imagefill($imageQuadrada, 0, 0, $branco);


$imagemOriginal = imagecreatefromjpeg($arquivo);

$graus = ($larguraOriginal > $alturaOriginal)? -90 : 0;

$imagemOriginal2 = imagerotate($imagemOriginal, $graus, 0);

$dst_x = ($larguraAltura - $alturaOriginal)/2;

imagecopyresampled($imageQuadrada, $imagemOriginal2, $dst_x, 0, 0, 0, $alturaOriginal, $larguraAltura, $alturaOriginal, $larguraAltura);

$fileName = 'C:/Temp/fotoscamisa/qua/quadrada'.rand(111111, 999999).'.jpeg';


imagejpeg($imageQuadrada, $fileName, 100);
?>
<?php
$arquivo = 'img/l.jpg';

$largura = 30;
$altura = 30;

list($larguraOriginal, $alturaOriginal) = getimagesize($arquivo);

$ratio = $larguraOriginal/$alturaOriginal;

//echo $ratio;

if ($largura/$altura > $ratio) {
     
     $largura = $altura * $ratio;
}else {
     
     $altura = $largura /$ratio;
}
//echo "<br> Original Largura: $larguraOriginal, Original Altura: $alturaOriginal";
//echo "<br> Largura: $largura, Altura: $altura";

$image_final = imagecreatetruecolor($largura, $altura);

$imagem_original = imagecreatefromjpeg($arquivo);

imagecopyresampled($image_final, $imagem_original, 0, 0, 0, 0, $largura, $altura, $larguraOriginal, $alturaOriginal);

header("Content-type: image/jpeg");
imagejpeg($image_final, null, 100);
$nomeImage = md5(time());
imagejpeg($image_final, "img/$nomeImage.jpeg", 100);
<?php
$imagem = 'img/alimentos-estresse.jpg';
list($larguraOriginal, $alturaOriginal) = getimagesize($imagem);

$novaImagem = imagecreatetruecolor($larguraOriginal, $alturaOriginal);

$imagemOri = imagecreatefromjpeg('img/alimentos-estresse.jpg');

$imagemMini = imagecreatefromjpeg('img/media.jpeg');
list($larguraMini, $alturaMini) = getimagesize('img/media.jpeg');

imagecopy($novaImagem, $imagemOri, 0, 0, 0, 0, $larguraOriginal, $alturaOriginal);

imagecopy($novaImagem, $imagemMini, 670, 350, 0, 0, $larguraMini, $alturaMini);

header("Content-Type: image/jpeg");
imagejpeg($novaImagem, null);

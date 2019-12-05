
<?php

$img = imagecreatetruecolor(300, 200);
$branco = imagecolorallocate($img, 255, 255, 255);
imagefill($img, 0, 0, $branco);


header("Content-type: image/jpeg");
imagejpeg($img, null, 100);
?>

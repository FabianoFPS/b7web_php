<?php
session_start();
header("Content-type: image/jpeg");

$numeroCaptcha = $_SESSION['captcha'];

$imagemCaptcha = imagecreate(100, 50);
imagecolorallocate($imagemCaptcha, 200, 200, 200);

$fontColor = imagecolorallocate($imagemCaptcha, 50, 50, 50);

$font = dirname(__FILE__).'/font/ginga.otf';

imagettftext($imagemCaptcha, 40, 0, 20, 35, $fontColor, $font, $numeroCaptcha);

imagejpeg($imagemCaptcha, null, 100);
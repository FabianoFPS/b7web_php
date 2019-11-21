<?php
session_start();

function novoCaptcha(){
     $_SESSION['captcha'] = rand(1000, 9999);
}

function verificaCaptcha( string $captcha){

    if ( $captcha != $_SESSION['captcha'] ){
         echo "Errou!";
         return false;
    }

    echo 'Acertou!';
    novoCaptcha();
    return true;
}

if( !isset($_SESSION['captcha']) ) novoCaptcha();

if( !empty($_POST['post_captcha']) ) verificaCaptcha($_POST['post_captcha']);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Document</title>
</head>
<body>
     <div>
          <img src="imagem.captcha.php" width="100" height="50">
     </div>
     <form action="" method="post">
          <input type="text" name="post_captcha" id="">
          <input type="submit" value="Verificar">
     </form>
</body>
</html>
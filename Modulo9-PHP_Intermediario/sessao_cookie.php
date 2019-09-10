<?php
session_start();

$_SESSION["teste"] = "Fabiano FPS";

//COOKIE

setcookie("cookiecriadoporphp", "Informação guardada?", time()+3600);
setcookie("identificacao", "0063950", time()+3600);

echo "cookie setado";

echo '<br><a href="acessando_sessao_cookie.php">acessando_sessao_cookie.php</a>';
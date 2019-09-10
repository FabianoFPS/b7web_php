<?php
session_start();

echo "Informação pela sessão: ".$_SESSION["teste"];
echo "<br>";


//COOKIE

echo "Meu COOKIE é de: ".$_COOKIE["cookiecriadoporphp"];
echo "<br>";
echo "Meu COOKIE é de: ".$_COOKIE["identificacao"];
<?php 
require_once "./config.php";
require_once "./config.inc.php";

const CARACTERIZA_DESLOGADO = 'logar';
const CADASTRO = 'cadastre-se.php';
const LOGIN = 'login.php';
const LOGOFF = 'logoff.php';

$login = $_SESSION['cLogin'] ?? CARACTERIZA_DESLOGADO ;
//$login = 'fabiano';

function meusAnuncios(string $login=CARACTERIZA_DESLOGADO): string {

    $HTMLMeusAnuncios = "<li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"#\">Meus Anuncios</a>
                        </li>";

    return ($login == CARACTERIZA_DESLOGADO)? '' : $HTMLMeusAnuncios ;
}

function loginLogoff(string $login=CARACTERIZA_DESLOGADO): string{

    $HTMLLogin = "<a class=\"nav-link\" href=".CADASTRO.">Cadastre-se</a>
                    <a class=\"nav-link\" href=\"".LOGIN."\">Login</a>";
    $HTMLLogoff = "<a class=\"nav-link\" href=\"".LOGOFF."\">Sair</a>";

    $html = ($login == CARACTERIZA_DESLOGADO)? $HTMLLogin : $HTMLLogoff ; 

    return $html;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classificados</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css" >
    <link rel="stylesheet" href="./assets/css/style.css" >
</head>
<body>
    <div class="">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">Classificados</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <?php echo meusAnuncios($login); ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features2</a>
                    </li>
                </ul>
                <?php echo loginLogoff($login); ?>
            </div>
        </nav>
    </div>
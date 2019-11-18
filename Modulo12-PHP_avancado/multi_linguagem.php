<?php
session_start();

if( isset($_GET['lang']) and !empty($_GET['lang']) ){

     $_SESSION['lang'] = $_GET['lang'];
}

require_once 'language.class.php';
$lang = new Language();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <meta name="description" content="Descrição">
     <meta name="author" content="Autor">
     <link rel="icon" href="logo.ico">
     <title>Document</title>
     <link rel="stylesheet" href="../Modulo11-BootstrapV4/bootstrap-4.3.1-dist/css/bootstrap.min.css">
</head>
<body>
     <div class="container">
          <div class="row">
               <div class="col-sm">
                    <a href="?lang=en">English</a>
               </div>
               <div class="col-sm">
                    <a href="?lang=pt-br">Português</a>
               </div>
               <div class="col-sm">
                    <a href="?lang=es">Español</a>
               </div>
          </div>
          <div class="row">
               <div class="col-sm">
                    <?php echo $lang->getLanguage(); ?>
               </div>
               <div class="col-sm">
                    <button class="btn btn-primary" type="button"><?php echo $lang->get('BUY'); ?></button>
               </div>
               <div class="col-sm">
                    <button class="btn btn-primary" type="button"><?php $lang->get('BUY', true); ?></button>
               </div>
               <div class="col-sm">
                    <button class="btn btn-primary" type="button"><?php echo $lang->getBanco('clothes'); ?></button>
               </div>
               <div class="col-sm">
                    <button class="btn btn-primary" type="button"><?php echo $lang->getBanco('photo'); ?></button>
               </div>
          </div>
     </div>
<script type="text/javascript" src="../../Modulo11-BootstrapV4/bootstrap-4.3.1-dist/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../../Modulo11-BootstrapV4/bootstrap-4.3.1-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

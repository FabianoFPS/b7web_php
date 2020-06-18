<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo PASTA_BASE; ?>assets/css/style.css">
</head>
<body>
    <h1>Este é o topo</h1>
    <a href="<?php echo BASE_URL; ?>">Home</a>
    <a href="<?php echo BASE_URL."Galeria"; ?>">Galeria</a>
    <hr>
    <?php $this->loadViewTemplate($viewName, $viewData); ?>
    <hr>
    <h6>Este é o rodapé</h6>
    <script src="<?php echo PASTA_BASE; ?>assets/js/script.js"></script>
    <script type="module">
        //import {  } from "module";
        import fnExportada from '<?php echo PASTA_BASE; ?>assets/js/modulo.js';
        fnExportada('Passado por parametro na funcção fnExportada');
    </script>
</body>
</html>
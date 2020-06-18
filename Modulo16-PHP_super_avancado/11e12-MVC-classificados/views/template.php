<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo PASTA_BASE; ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo PASTA_BASE; ?>assets/css/style.css">
</head>
<body>
    <nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="./" class="navbar-brand">Classificados</a>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<?php if(isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin'])): ?>
					<li><a href="meus-anuncios.php">Meus Anúncios</a></li>
					<li><a href="sair.php">Sair</a></li>
				<?php else: ?>
					<li><a href="cadastre-se.php">Cadastre-se</a></li>
					<li><a href="login.php">Login</a></li>
				<?php endif; ?>
			</ul>
		</div>
	</nav>
    <?php $this->loadViewTemplate($viewName, $viewData); ?>
    <script src="<?php echo PASTA_BASE; ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo PASTA_BASE; ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo PASTA_BASE; ?>assets/js/script.js"></script>
    <script type="module">
        //import {  } from "module";
        import fnExportada from '<?php echo PASTA_BASE; ?>assets/js/modulo.js';
        fnExportada('Passado por parametro na funcção fnExportada');
    </script>
</body>
</html>
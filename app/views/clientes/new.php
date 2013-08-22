<?php
include '../../constantes.php';
require_once ROOT . 'views/template/header.php';
require_once ROOT . 'views/template/header-menu.php';
?>
<div class="container">
	<ol class="breadcrumb">
		<li><a href="<?php echo ROOT?>home.php">Home</a></li>
		<li><a href="<?php echo ROOT?>views/clientes/index.php">Clientes</a></li>
		<li class="active">Novo cliente</li>
	</ol>
	<?php include '_form.php'; ?>
	<a href="index.php" class="label label-warning">voltar</a> | <a href="<?php echo ROOT?>home.php" class="label label-default">principal</a>
</div>
<?php
include ROOT . 'views/template/footer.php';
?>
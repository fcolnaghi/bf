<?php
include '../../constantes.php';
require_once ROOT . 'views/template/header.php';
require_once ROOT . 'views/template/header-menu.php';
?>
<div class="container">
	<ol class="breadcrumb">
		<li><a href="<?php echo ROOT?>home.php">Home</a></li>
		<li><a href="<?php echo ROOT?>views/operadores/index.php">Operadores</a></li>
		<li class="active">Editar operador</li>
	</ol>
	<?php if (isset($_GET['msg'])) : ?>
		<div class="alert alert-success"><?php echo urldecode($_GET['msg']);?></div>
	<?php endif ?>
	<?php include '_form.php'; ?>
	<a href="show.php?id=<?php echo $_GET['id'];?>" class="label label-default">visualizar</a> | <a href="index.php" class="label label-default">voltar</a>
	<hr>
</div>
<?php
include ROOT . 'views/template/footer.php';
?>

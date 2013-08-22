<?php
include '../../constantes.php';
require_once ROOT . 'views/template/header.php';
require_once ROOT . 'views/template/header-menu.php';
?>
<div class="container">
	<ol class="breadcrumb">
		<li><a href="<?php echo ROOT?>home.php">Home</a></li>
		<li><a href="<?php echo ROOT?>views/atendimentos/index.php">Atendimentos</a></li>
		<li class="active">Novo atendimento</li>
	</ol>
	<?php include '_form.php'; ?>
</div>
<?php
include ROOT . 'views/template/footer.php';
?>
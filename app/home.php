<?php
	include "constantes.php";
	
	include_once ROOT .'views/template/header.php';
	include_once ROOT .'views/template/header-menu.php';
?>
<div class="container">
	<ol class="breadcrumb">
		<li><a href="<?php echo ROOT?>home.php">Home</a></li>
		<li><a href="<?php echo ROOT?>views/atendimentos/index.php">Atendimentos</a></li>
		<li class="active">Novo atendimento</li>
	</ol>
	<?php include ROOT.'views/atendimentos/_form.php'; ?>
</div>
</div>
<?php
	require_once ROOT.'views/template/footer.php';
?>
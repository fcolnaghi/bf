<?php
include '../../constantes.php';
require_once ROOT . 'views/template/header.php';
require_once ROOT . 'views/template/header-menu.php';

$opc = new OperadorController ();
$opc->show ( $_GET ["id"] );
$cc = $opc->operador;

?>
<div class="container">
	<ol class="breadcrumb">
		<li><a href="<?php echo ROOT?>home.php">Home</a></li>
		<li><a href="<?php echo ROOT?>views/operadores/index.php">Operadores</a></li>
		<li class="active">Visualização operador</li>
	</ol>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Visualização do Operador</h3>
		</div>
		<div class="panel-body">
			<div class="form-group">
				<label class="control-label" for="nome">Nome do Operador</label> <input type="text" readonly="readonly" class="form-control" name="nome" id="nome" value="<?php echo $cc->nome; ?>">
			</div>
			<div class="form-group">
				<label for="nome">Login Usuário</label>
				<input class="form-control" readonly="readonly"  name="descricao" id="descricao" value="<?php echo $cc->usuario; ?>">
			</div>
		</div>
	</div>
	<a href="edit.php?id=<?php echo $_GET['id'];?>" class="label label-warning">editar</a> | <a href="index.php" class="label label-default">voltar</a>
</div>
<?php
include ROOT . 'views/template/footer.php';
?>
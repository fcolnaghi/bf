<?php
include '../../constantes.php';
require_once ROOT . 'views/template/header.php';
require_once ROOT . 'views/template/header-menu.php';

$opc = new ClienteController ();
$opc->show ( $_GET ["id"] );
$cliente = $opc->cliente;

?>
<div class="container">
	<ol class="breadcrumb">
		<li><a href="<?php echo ROOT?>home.php">Home</a></li>
		<li><a href="<?php echo ROOT?>views/clientes/index.php">Clientes</a></li>
		<li class="active">Visualização Cliente</li>
	</ol>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Visualização do Cliente</h3>
		</div>
		<div class="panel-body">
			<div class="form-group">
				<label class="control-label" for="nome">Nome</label> <input type="text" class="form-control required" readonly="readonly"  name="nome" id="nome" value="<?php echo $cliente->nome; ?>">
			</div>
			<div class="form-group">
				<label for="email">E-mail</label>
				<input type="email" class="form-control required" name="email" id="email" readonly="readonly"  value="<?php echo $cliente->email; ?>">
			</div>
			<div class="row">
				<div class="form-group col-md-2">
					<label for="tel_res">Tel. Residencial</label> <input class="form-control tel" readonly="readonly"  type="text" name="tel_res" id="tel_res" value="<?php echo $cliente->tel_res; ?>">
				</div>
				<div class="form-group col-md-2">
					<label for="tel_cel">Tel. Celular</label> <input class="form-control tel" readonly="readonly"  type="text" name="tel_cel" id="tel_res" value="<?php echo $cliente->tel_cel; ?>">
				</div>
				<div class="form-group col-md-2">
					<label for="tel_com">Tel. Comercial</label> <input class="form-control tel" readonly="readonly"  type="text" name="tel_com" id="tel_com" value="<?php echo $cliente->tel_com; ?>">
				</div>
			</div>
		</div>
	</div>
	<a href="edit.php?id=<?php echo $_GET['id'];?>" class="label label-warning">editar</a> | <a href="index.php" class="label label-default">voltar</a>
</div>
<?php
include ROOT . 'views/template/footer.php';
?>
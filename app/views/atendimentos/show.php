<?php
include '../../constantes.php';
require_once ROOT . 'views/template/header.php';
require_once ROOT . 'views/template/header-menu.php';

$ac = new AtendimentoController ();
$ac->show ( $_GET ["id"] );
$a = $ac->atendimento;

?>
<div class="container">
	<ol class="breadcrumb">
		<li><a href="<?php echo ROOT?>home.php">Home</a></li>
		<li><a href="<?php echo ROOT?>views/atendimentos/index.php">Atendimentos</a></li>
		<li class="active">Visualização de atendimento</li>
	</ol>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Visualização do atendimento</h3>
		</div>
		<div class="panel-body">
			<div class="form-group">
				<label class="control-label" for="nome">Cliente</label>
				<input type="text" readonly="readonly" class="form-control" name="nome" id="nome" value="<?php echo $a->cliente->nome; ?>">
			</div>
			<div class="form-group">
				<label for="nome">Descrição</label>
				<textarea class="form-control" readonly="readonly"  name="descricao" id="descricao" rows="5" cols="50"><?php echo $a->descricao; ?></textarea>
			</div>
			<div class="row">
				<div class="form-group col-md-2">
					<label for="nome">Valor</label> <input readonly="readonly"  class="form-control money" type="text" name="valor" id="valor" value="<?php echo $a->valor; ?>">
				</div>
			</div>
		</div>
	</div>
	<a href="edit.php?id=<?php echo $_GET['id'];?>" class="label label-warning">editar</a> | <a href="index.php" class="label label-default">voltar</a>
</div>
<?php
include ROOT . 'views/template/footer.php';
?>
<?php
include '../../constantes.php';
require_once ROOT . 'views/template/header.php';
require_once ROOT . 'views/template/header-menu.php';
require_once ROOT . 'controllers/produto.php';

$pc = new ProdutoController ();
$pc->show ( $_GET ["id"] );
$p = $pc->produto;

?>
<div class="container">
	<ol class="breadcrumb">
		<li><a href="<?php echo ROOT?>home.php">Home</a></li>
		<li><a href="<?php echo ROOT?>views/produtos/index.php">Produtos</a></li>
		<li class="active">Visualização produto</li>
	</ol>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Visualização do Produto</h3>
		</div>
		<div class="panel-body">
			<div class="form-group">
				<label class="control-label" for="nome">Produto</label> <input type="text" readonly="readonly" class="form-control" name="nome" id="nome" value="<?php echo $p->nome; ?>">
			</div>
			<div class="form-group">
				<label for="nome">Descrição</label>
				<textarea class="form-control" readonly="readonly"  name="descricao" id="descricao" rows="5" cols="50"><?php echo $p->descricao; ?></textarea>
			</div>
			<div class="row">
				<div class="form-group col-md-2">
					<label for="nome">Valor</label> <input readonly="readonly"  class="form-control money" type="text" name="valor" id="valor" value="<?php echo $p->valor; ?>">
				</div>
				<div class="form-group col-md-2">
					<label for="nome">Quantidade</label><input readonly="readonly" class="form-control qtd" type="text" name="qtd" id="qtd" value="<?php echo $p->qtd; ?>">
				</div>
			</div>
		</div>
	</div>
	<a href="edit.php?id=<?php echo $_GET['id'];?>" class="label label-warning">editar</a> | <a href="index.php" class="label label-default">voltar</a>
</div>
<?php
include ROOT . 'views/template/footer.php';
?>
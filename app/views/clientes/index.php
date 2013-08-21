<?php
include '../../constantes.php';
require_once ROOT . 'views/template/header.php';
require_once ROOT . 'views/template/header-menu.php';
require_once ROOT . 'controllers/produto.php';
?>
<div class="container">
	<ol class="breadcrumb">
	  <li><a href="<?php echo ROOT?>home.php">Home</a></li>
	  <li class="active">Produtos</li>
	</ol>
	<div class="panel">
		<div class="panel panel-default">
			
			<div class="panel-heading">
				<h5 class="panel-title">Listar produtos</h5>
			</div>
			<div class="panel-body">
				<table class="table table-condensed">
					<thead>
						<tr>
							<th><?php echo utf8_encode("#Código"); ?></th>
							<th><?php echo utf8_encode("Nome Completo"); ?></th>
							<th><?php echo utf8_encode("Telefones"); ?></th>
							<th width="190"><?php echo utf8_encode("Ações"); ?></th>
						</tr>
					</thead>
					<?php
					
					$pc = new ProdutoController ();
					
					foreach ( $pc->produtos as $row ) {
						?>
							<tr>
						<td><?php echo $row[0]?></td>
						<td><?php echo $row[1]?></td>
						<td><?php echo $row[2]?></td>
						<td><a href="" class="label label-default">visualizar</a> | <a href="" class="label label-warning">editar</a> | <a href="" class="label label-danger">excluir</a></td>
					</tr>
						<?php
					}
					
					?>
				</table>
			</div>
			<div class="panel-footer">
				<ul class="pagination">
					<li><a href="#">&laquo;</a></li>
					<li><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">5</a></li>
					<li><a href="#">&raquo;</a></li>
				</ul>
				<ul class="nav pull-right">
					<li><button class="btn btn-primary">Novo produto</button></li>
				</ul>
			</div>
		</div>
		
	</div>
</div>
<?php
include ROOT . 'views/template/footer.php';
?>
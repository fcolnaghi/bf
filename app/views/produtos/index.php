<?php
include '../../constantes.php';
require_once ROOT . 'views/template/header.php';
require_once ROOT . 'views/template/header-menu.php';
?>
<script>
$(document).ready(function() {
	$("#produtos").dataTable({
		"oLanguage": {
			"sSearch": "Pesquisar por",
			"sLengthMenu": "Mostrando _MENU_ registros por página",
			"sZeroRecords": "Nenhum registro encontrado!",
			"sInfo": "Mostrando _START_ de _END_ em _TOTAL_ registros",
			"sInfoEmpty": "Mostrando 0 de 0 em 0 registros",
			"sInfoFiltered": "(Filtrado dos _MAX_ registros)",
			"oPaginate": {
				"sFirst": "Primeiro",
				"sPrevious": "Anterior",
				"sNext": "Próximo",
				"sLast": "Último"
			}
		},
		"aoColumnDefs": [ { "bSortable": false, "aTargets": [ 5 ] } ],
		"sPaginationType": "full_numbers"
	})
});
</script>
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
				<table id="produtos" class="tablesorter table table-condensed ">
					<thead>
						<tr>
							<th width="90">Código</th>
							<th width="250">Produto</th>
							<th>Descrição</th>
							<th width="150">Preço</th>
							<th width="80">Qtd.</th>
							<th width="200">Ações</th>
						</tr>
					</thead>
					
					<?php
					
					$opc = new ProdutoController();
					$opc->index();
					
					foreach ( $opc->produtos as $row ) {
						?>
					<tr>
						<td><?php echo $row[0]?></td>
						<td><?php echo $row[1]?></td>
						<td><?php echo strlen($row[2]) > 100 ? substr($row[2],0, 100)."..." : $row[2];?></td>
						<td><?php echo number_format(str_replace(",",".",$row[3]), 2, ',', '.');?></td>
						<td><?php echo $row[4]?></td>
						<td><a href="show.php?id=<?php echo $row[0]?>" class="label label-default">visualizar</a> | <a href="edit.php?id=<?php echo $row[0]?>" class="label label-warning">editar</a> | <a href="javascript:destroy('<?php echo $row[0]?>');"
							class="label label-danger"
						>excluir</a></td>
					</tr>
						<?php
					}
					
					?>
				</table>
			</div>
			<div class="panel-footer">
				<a href="new.php" class="btn btn-primary">Adicionar novo produto</a>
			</div>
		</div>
	</div>
</div>
<?php
include ROOT . 'views/template/footer.php';
?>
<?php
include '../../constantes.php';
include_once ROOT . 'views/template/header.php';
include_once ROOT . 'views/template/header-menu.php';
?>
<script>
$(document).ready(function() {
	$("#operadores").dataTable({
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
		"aoColumnDefs": [ { "bSortable": false, "aTargets": [ 3 ] } ],
		"sPaginationType": "full_numbers"
	})
});
</script>
<div class="container">
	<ol class="breadcrumb">
		<li><a href="<?php echo ROOT?>home.php">Home</a></li>
		<li class="active">Operadores</li>
	</ol>
	<div class="panel">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h5 class="panel-title">Listar operadores</h5>
			</div>
			<div class="panel-body">
				<table id="operadores" class="tablesorter table table-condensed ">
					<thead>
						<tr>
							<th width="90">Código</th>
							<th width="250">Usuário</th>
							<th >Nome</th>
							<th width="200">Ações</th>
						</tr>
					</thead>
					
					<?php
					
					$opc = new OperadorController();
					$opc->index();
					
					foreach ( $opc->operadores as $row ) {
						?>
					<tr>
						<td><?php echo $row[0]?></td>
						<td><?php echo $row[2]?></td>
						<td><?php echo $row[1]?></td>
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
				<a href="new.php" class="btn btn-primary">Adicionar novo operador</a>
			</div>
		</div>
	</div>
</div>
<?php
include ROOT . 'views/template/footer.php';
?>
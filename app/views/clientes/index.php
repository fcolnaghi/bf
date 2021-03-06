<?php
include '../../constantes.php';
include_once ROOT . 'views/template/header.php';
include_once ROOT . 'views/template/header-menu.php';
?>
<script>
$(document).ready(function() {
	$("#clientes").dataTable({
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
		"aoColumnDefs": [ { "bSortable": false, "aTargets": [ 6 ] } ],
		"sPaginationType": "full_numbers"
	})
});
</script>
<div class="container">
	<ol class="breadcrumb">
		<li><a href="<?php echo ROOT?>home.php">Home</a></li>
		<li class="active">Clientes</li>
	</ol>
	<div class="panel">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h5 class="panel-title">Listar clientes</h5>
			</div>
			<div class="panel-body">
				<table id="clientes" class="tablesorter table table-condensed ">
					<thead>
						<tr>
							<th width="90">Código</th>
							<th width="250">Nome Cliente</th>
							<th >Tel. Res</th>
							<th >Tel. Cel</th>
							<th >Tel. Com</th>
							<th  width="150">E-mail</th>
							<th width="200">Ações</th>
						</tr>
					</thead>
					
					<?php
					
					$opc = new ClienteController();
					$opc->index();
					
					foreach ( $opc->clientes as $row ) {
						?>
					<tr>
						<td><?php echo $row[0]?></td>
						<td><?php echo $row[1]?></td>
						<td><?php echo $row[2] != "" ? $row[2] : "-"?></td>
						<td><?php echo $row[3] != "" ? $row[3] : "-"?></td>
						<td><?php echo $row[4] != "" ? $row[4] : "-"?></td>
						<td><?php echo $row[5] != "" ? $row[5] : "-"?></td>
						
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
				<a href="new.php" class="btn btn-primary">Adicionar novo cliente</a>
			</div>
		</div>
	</div>
</div>
<?php
include ROOT . 'views/template/footer.php';
?>
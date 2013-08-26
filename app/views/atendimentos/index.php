<?php
include '../../constantes.php';
require_once ROOT . 'views/template/header.php';
require_once ROOT . 'views/template/header-menu.php';
?>
<script>
$(document).ready(function() {
	$("#atendimentos").dataTable({
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
		"aoColumnDefs": [ { "bSortable": false, "aTargets": [ 4 ] } ],
		"sPaginationType": "full_numbers"
	})
});
</script>
<div class="container">
	<ol class="breadcrumb">
		<li><a href="<?php echo ROOT?>home.php">Home</a></li>
		<li class="active">Atendimentos</li>
	</ol>
	<div class="panel">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h5 class="panel-title">Listar atendimentos</h5>
			</div>
			<div class="panel-body">
				<table id="atendimentos" class="tablesorter table table-condensed ">
					<thead>
						<tr>
							<th width="90">Código</th>
							<th>Cliente</th>
							<th width="150">Data Atend.</th>
							<th width="150">Total</th>
							<th width="150">Ações</th>
						</tr>
					</thead>
					
					<?php
					
					$sc = new AtendimentoController();
					$sc->index();
					
					foreach ( $sc->atendimentos as $row ) { ?>
					<tr>
						<td><?php echo $row[0]?></td>
						<td><?php echo $row[1]?></td>
						<td><?php echo Atendimento::parseDataShow($row[2]); ?></td>
						<td><?php echo number_format($row[3], 2, ",", "."); ?></td>
						<td><a href="show.php?id=<?php echo $row[0]?>" class="label label-default">visualizar</a></td>
					</tr>
					<?php	}	?>
				</table>
			</div>
			<div class="panel-footer">
				<a href="new.php" class="btn btn-primary">Adicionar novo atendimento</a>
			</div>
		</div>
	</div>
</div>
<?php
include ROOT . 'views/template/footer.php';
?>
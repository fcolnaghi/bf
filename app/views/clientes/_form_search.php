<form method="POST">
	<div class="form-group">
		<label class="control-label" for="nome">Nome</label> <input type="text" class="form-control required" name="nome" id="nome">
	</div>
		<table id="clientes" class="tablesorter table table-condensed ">
			<thead>
				<tr>
					<th width="90">Código</th>
					<th>Nome Cliente</th>
				</tr>
			</thead>
		<?php
		$opc = new ClienteController ();
		$opc->index ();
		
		foreach ( $opc->clientes as $row ) {
			?>
			<tr onclick="addCliente('<?php echo $row[0] ?>', '<?php echo $row[1]?>')">
				<td><?php echo $row[0]?></td>
				<td><?php echo $row[1]?></td>
			</tr>
			<?php } ?>
		</table>
</form>
<script>
	function addCliente(id, nome) {
		$("input#nome").val(nome);
		$("input#id_cliente").val(id);
		
		$("#modalCliente").modal('hide');
	}
</script>

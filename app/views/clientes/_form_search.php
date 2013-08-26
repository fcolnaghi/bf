<div class="form-group">
	<label class="control-label" for="nome">Nome</label> <input type="text" class="form-control required" name="nome_cliente" id="nome_cliente">
</div>
<div style="max-height: 150px; overflow-y: auto; overflow-x: hidden;">
	<table id="clientes" class="tablesorter table table-condensed " style="max-height: 150px; overflow-y: auto">
		<thead>
			<tr>
				<th width="90">Código</th>
				<th>Nome Cliente</th>
			</tr>
		</thead>
		<tbody></tbody>
	</table>
</div>
<script>
	$(document).ready(function() {
		$("#nome_cliente").on("keyup", function() {
			 if($(this).val().length >= 2) {
				$.ajax({
					type: "POST",
					url: "<?php echo ROOT?>views/clientes/search.php",
					data: { nome_cliente: $(this).val() },
					beforeSend: function () { 
						$("#nome_cliente").attr("disabled", "disabled");
					}
				}).done(function( retorno ) {
					$("#clientes tbody").html('');
					
					retorno = $.parseJSON( retorno );
					for(i = 0; i < retorno.length; i++) {
						$res = '<tr onclick="addCliente(\''+retorno[i]['id']+'\', \''+retorno[i]['nome']+'\')"><td>'+retorno[i]['id']+'</td><td>'+retorno[i]['nome']+'</td></tr>';
						$("#clientes tbody").append($res);
					}

					$("#nome_cliente").removeAttr("disabled");
				});
			 }
		});
	});
		
	function addCliente(id, nome) {
		$("input#nome").val(nome);
		$("input#id_cliente").val(id);
		
		$("#modalCliente").modal('hide');
	}
</script>

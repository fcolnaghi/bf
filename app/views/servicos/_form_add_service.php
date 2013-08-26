	<div class="row">
		<div class="col-md-6">
			<label class="control-label" for="nome">Serviço executado</label>
			<select class="form-control required" id="id_servico" name="id_servico" onchange="alterarServico(this, $('#qtd_servico'))">
				<option value="">- Selecione o serviço -</option>
			<?php
			$sc = new ServicoController ();
			$sc->index ();
			
			foreach ( $sc->servicos as $row ) {
				?>
					<option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
			<?php
			}
			?>
		</select>
		</div>
		
		<div class="col-md-2">
			<label class="control-label" for="qtd">Qtd.</label>
			<input type="text" class="form-control required qtd" disabled="disabled" onkeyup="calculo(valorServico, this, $('#vlr_servico'))" name="qtd_servico" id="qtd_servico">
		</div>
		
		<div class="col-md-4">
			<label class="control-label" for="qtd">Total</label>
			R$ <input type="text" readonly="readonly" class="form-control money" name="vlr_servico" id="vlr_servico">
		</div>
	</div>
<script>
	var valorServico = 0;
	var posicaoServico = 0;
		
	function alterarServico(item, campo) {
		if($(item).val() != "") {
			
			$.ajax({
				type: "POST",
				url: "<?php echo ROOT?>views/servicos/add.php",
				data: { id_servico: $(item).val() },
				beforeSend: function () { 
					$(item).attr("disabled", "disabled");
				}
			}).done(function( retorno ) {

				$(campo).val('');
				$("#vlr_servico").val('0,00');
				
				$(item).removeAttr("disabled");
				$(campo).removeAttr("disabled");
				
				retorno = $.parseJSON( retorno );
				valorServico = parseFloat(retorno.valor);
				
			});
		} else {
			$(campo).attr("disabled", "disabled");
			$(campo).val();
			$("#vlr_servico").val('0,00');
		}
	}

	function addServico() {
		
		if ( validarModal('modalServico') ) {
		//if ( $('#id_servico').val() != "" && ($('#qtd_servico').val() != "" && $('#qtd_servico').val() != '0') ) {
			var el = $("#tbl_servico tbody");
			
			id = $('#id_servico').val();
			servico = $('#id_servico option:selected').text();
			qtd = $('#qtd_servico').val(); 
			total = $('#vlr_servico').val();

			addSubtotal(total.replace(".","").replace(",","."));
		
			el.append('<tr data-pos="'+ posicaoServico +'"><td>'+id+'</td><td>'+servico+'</td><td>'+qtd+'</td><td>'+total+'</td><td><a href="#" onclick="removerServico('+posicaoServico+')" class="label label-danger">remover</a></td></tr>');
			$("form#atendimento").append('<input type="hidden" name="servicos[]" data-pos="'+ posicaoServico +'" value="'+id+"|"+qtd+'">');
	
			$('#id_servico').val('');
			$('#qtd_servico').val('').attr("disabled", "disabled");
			$('#vlr_servico').val('0,00');
			vlrServico = 0;
			posicaoServico++;
			return false;
		}
	}

	function removerServico(posicao) {
		if(window.confirm('Deseja realmente excluir este item (' + posicao + ') ?')) {

			$("input[name='servicos[]']").each( function () { 
				if($(this).data('pos') == posicao) {
					$(this).remove();
				} 
			});

			$("#tbl_servico tbody tr").each( function () {
				if($(this).data('pos') == posicao) { 
					valor = $(this).find("td").eq(3).html();
					removeSubtotal(valor.replace(".","").replace(",","."));
					$(this).remove();
				}
			});
			
		}		
	}
</script>

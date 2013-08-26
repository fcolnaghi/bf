	<div class="row">
		<div class="col-md-6">
			<label class="control-label" for="nome">Produto comprado</label>
			<select class="form-control required" id="id_produto" name="id_produto" onchange="alterarProduto(this, $('#qtd_produto'))">
				<option value="">- Selecione o produto -</option>
			<?php
			$pc = new ProdutoController ();
			$pc->index ();
			
			foreach ( $pc->produtos as $row ) {
				?>
					<option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
			<?php
			}
			?>
		</select>
		</div>
		
		<div class="col-md-2">
			<label class="control-label" for="qtd">Qtd.</label>
			<input type="text" class="form-control required qtd" disabled="disabled" onkeyup="calculo(valorProduto, this, $('#vlr_produto'))" name="qtd_produto" id="qtd_produto">
		</div>
		
		<div class="col-md-4">
			<label class="control-label" for="qtd">Total</label>
			R$ <input type="text" readonly="readonly" class="form-control money" name="vlr_produto" id="vlr_produto">
		</div>
	</div>
<script>
	var valorProduto = 0;
	var posicaoProduto = 0;

	function alterarProduto(item, campo) {
		if($(item).val() != "") {
			
			$.ajax({
				type: "POST",
				url: "<?php echo ROOT?>views/produtos/add.php",
				data: { id_produto: $(item).val() },
				beforeSend: function () { 
					$(item).attr("disabled", "disabled");
				}
			}).done(function( retorno ) {

				$(campo).val('');
				$("#vlr_produto").val('0,00');
				
				$(item).removeAttr("disabled");
				$(campo).removeAttr("disabled");
				
				retorno = $.parseJSON( retorno );
				valorProduto = parseFloat(retorno.valor);
				
			});
		} else {
			$(campo).attr("disabled", "disabled");
			$(campo).val();
			$("#vlr_produto").val('0,00');
		}
	}

	function addProduto() {
		
		if ( validarModal('modalProduto') ) {
		//if ( $('#id_produto').val() != "" && ($('#qtd_produto').val() != "" && $('#qtd_produto').val() != '0') ) {
			var el = $("#tbl_produto tbody");
			
			id = $('#id_produto').val();
			produto = $('#id_produto option:selected').text();
			qtd = $('#qtd_produto').val(); 
			total = $('#vlr_produto').val();

			addSubtotal(total.replace(".","").replace(",","."));
			
			el.append('<tr data-pos="'+ posicaoProduto +'"><td>'+id+'</td><td>'+produto+'</td><td>'+qtd+'</td><td>'+total+'</td><td><a href="#" onclick="removerProduto('+posicaoProduto+')" class="label label-danger">remover</a></td></tr>');
			$("form#atendimento").append('<input type="hidden" name="produtos[]" data-pos="'+ posicaoProduto +'" value="'+id+"|"+qtd+'">');
	
			$('#id_produto').val('');
			$('#qtd_produto').val('').attr("disabled", "disabled");
			$('#vlr_produto').val('0,00');
			vlrProduto = 0;
			posicaoProduto++;
			return false;
		}
	}

	function removerProduto(posicao) {
		if(window.confirm('Deseja realmente excluir ?')) {

			$("input[name='produtos[]']").each( function () { 
				if($(this).data('pos') == posicao) {
					$(this).remove();
				} 
			});

			$("#tbl_produto tbody tr").each( function () {
				if($(this).data('pos') == posicao) { 
					valor = $(this).find("td").eq(3).html();
					removeSubtotal(valor.replace(".","").replace(",","."));
					$(this).remove();
					
				}
			});
		}	
	}
</script>

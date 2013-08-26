<?php
$sc = new AtendimentoController ();

if (isset ( $_POST ['id'] )) {
	
	$atendimento = new Atendimento ();
	
	$atendimento->id_cliente = $_POST ['id_cliente'];
	$atendimento->id_operador = $ops->id;
	$atendimento->data_atendimento = $_POST['data_atendimento'];
	
	$atendimento->desconto = $_POST ['desconto'];
	$atendimento->subtotal = $_POST ['subtotal'];
	$atendimento->total = $_POST ['total'];
	if(isset($_POST ['produtos'])) {
		$atendimento->produtos = $_POST ['produtos'];
	}
	if(isset( $_POST ['servicos'])) {
		$atendimento->servicos= $_POST ['servicos'];
	}
	
	if ($_POST ['id'] != "") {
		$atendimento->id = $_POST['id'];
		$sc->update ( $atendimento );
	} else {
		$sc->create ( $atendimento );
	}
}

if (isset ( $_GET ["id"] )) {
	$sc->show ( $_GET ["id"] );
	$atendimento = $sc->atendimento;
	$form_title = "Edição de atendimento";
} else {
	$atendimento = new Atendimento ();
	$form_title = "Cadastro de atendimento";
}

?>
<script>
	var subTotal = 0;
	var total = 0;
	var desconto = 0;

	function removeSubtotal(valor) {
		subTotal -= parseFloat(valor);
		
		$("#subtotal").val(number_format(subTotal, 2, '.', ''));
		$("#subtotal").removeAttr("readonly");
		$("#subtotal").maskMoney({thousands: '.',	decimal: ','});
		$("#subtotal").maskMoney('mask');
		$("#subtotal").attr("readonly","readonly");

		calculoTotal();
	}
	

	function addSubtotal(valor) {
		subTotal += parseFloat(valor);
		
		$("#subtotal").val(number_format(subTotal, 2, '.', ''));
		$("#subtotal").removeAttr("readonly");
		$("#subtotal").maskMoney({thousands: '.',	decimal: ','});
		$("#subtotal").maskMoney('mask');
		$("#subtotal").attr("readonly","readonly");

		calculoTotal();
	}

	function calculoTotal() {
		var des = $("#desconto").val();
		var tot = number_format(parseFloat(subTotal - des.replace(".","").replace(",", ".")), 2, '.', '');

		$("#total").val(tot);
		$("#total").removeAttr("readonly");
		$("#total").maskMoney({thousands: '.',	decimal: ','});
		$("#total").maskMoney('mask');
		$("#total").attr("readonly","readonly");
		
	}

	function calculo(valor, qtd, campo) {

		calc = number_format(parseFloat(valor * qtd.value), 2, '.', '');
		
		$(campo).val(calc);
		$(campo).removeAttr("readonly");
		$(campo).maskMoney({thousands: '.',	decimal: ','});
		$(campo).maskMoney('mask');
		$(campo).attr("readonly","readonly");
		
	}
	
</script>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title"><?php echo $form_title; ?></h3>
	</div>
	<form method="POST" id="atendimento">
		<div class="panel-body">
			<div class="row">
				<div class="form-group col-md-4">
					<label class="sr-only" for="nome">Cliente</label> <input type="text" class="form-control required" readonly="readonly" name="nome" id="nome" value="<?php echo $atendimento->cliente['nome']; ?>">
				</div>
				<button data-toggle="modal" data-backdrop="static" href="#modalCliente" type="button" class="btn btn-default">Buscar Cliente</button>
				<div class="form-group col-md-2 pull-right ">
					<label class="sr-only" for="data">Data</label> <input type="text" class="form-control required" style="text-align: center" readonly="readonly" name="data_atendimento" id="data_atendimento" value="<?php echo date("d/m/Y H:i:s")?>">
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">
								Lista de Serviços
								<button data-toggle="modal" data-backdrop="static" href="#modalServico" class="btn btn-xs btn-warning pull-right" id="add_produto">adicionar serviço</button>
							</h3>
						</div>
						<div class="panel-body" style="height: 250px; max-height: 250px; overflow-y: auto">
							<table id="tbl_servico" class="table table-condensed">
								<thead>
									<tr>
										<th width="80">#Código</th>
										<th>Descrição</th>
										<th width="100">Qtd</th>
										<th width="100">Valor</th>
										<th width="50"></th>
									</tr>
								</thead>
								<tbody></tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">
								Lista de Produtos
								<button data-toggle="modal" data-backdrop="static" href="#modalProduto" class="btn btn-xs btn-warning pull-right" id="add_produto">Inserir novo produto</button>
							</h3>
						</div>
						<div class="panel-body" style="height: 250px; max-height: 250px; overflow-y: auto">
							<table id="tbl_produto" class="table table-condensed">
								<thead>
									<tr>
										<th width="80">#Código</th>
										<th>Descrição</th>
										<th width="100">Qtd</th>
										<th width="100">Valor</th>
										<th width="50"></th>
									</tr>
								</thead>
								<tbody></tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-2  pull-right">
					<label class="control-label" for="nome">Total</label> <input type="text" class="form-control money required" style="text-align: center" readonly="readonly" name="total" id="total" value="">
				</div>
				<div class="form-group col-md-2  pull-right">
					<label class="control-label" for="nome">Desconto</label> <input type="text" class="form-control money" style="text-align: center" name="desconto" id="desconto" onkeyup="calculoTotal();">
				</div>
				<div class="form-group col-md-2 pull-right">
					<label class="control-label" for="nome">Sub-Total</label> <input type="text" class="form-control money required" readonly="readonly" name="subtotal" id="subtotal" value="">
				</div>
			</div>
			<input type="hidden" name="id" id="id" value="<?php echo $atendimento->id; ?>">
			<input type="hidden" name="id_cliente" id="id_cliente" value="<?php echo $atendimento->id_cliente; ?>">
		</div>
		<div class="panel-footer">
			<div class="form-group">
				<label class="sr-only" for="nome">Desconto</label> <input type="submit" id="salvar" class="btn btn-primary pull-right" value="Finalizar atendimento">
			</div>
			<br>
		</div>
	</form>
</div>
<!-- Modal -->
<div class="modal" id="modalCliente" tabindex="-1" role="dialog" aria-labelledby="modalClienteLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Selecionar Cliente</h4>
			</div>
			<div class="modal-body">
				<?php include ROOT."views/clientes/_form_search.php"?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- Modal -->
<div class="modal" id="modalServico" tabindex="-1" role="dialog" aria-labelledby="modalServicoLabel" aria-hidden="true">
	<div class="modal-dialog">
		<form id="modalServico" class="form-inline">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Selecionar Serviço</h4>
			</div>
			<div class="modal-body">
				<?php include ROOT."views/servicos/_form_add_service.php"?>		
			</div>
			<div class="modal-footer">
				<button type="button" onclick="addServico()" class="btn btn-primary">Inserir serviço</button>
			</div>
		</div>
		</form>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- Modal -->
<div class="modal" id="modalProduto" tabindex="-1" role="dialog" aria-labelledby="modalProdutoLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Selecionar Produto</h4>
			</div>
			<div class="modal-body">
				<?php include ROOT."views/produtos/_form_add_product.php"?>		
			</div>
			<div class="modal-footer">
				<button type="button" onclick="addProduto()" class="btn btn-primary">Inserir produto</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
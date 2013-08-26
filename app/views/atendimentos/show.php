<?php
include '../../constantes.php';
require_once ROOT . 'views/template/header.php';
require_once ROOT . 'views/template/header-menu.php';

$ac = new AtendimentoController ();
$ac->show ( $_GET ["id"] );
$a = $ac->atendimento;
?>
<div class="container">
	<ol class="breadcrumb">
		<li><a href="<?php echo ROOT?>home.php">Home</a></li>
		<li><a href="<?php echo ROOT?>views/atendimentos/index.php">Atendimentos</a></li>
		<li class="active">Visualização de atendimento</li>
	</ol>
	
	
	
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Visualização do atendimento</h3>
		</div>
		<div class="panel-body">
		
		<div class="row">
				<div class="form-group col-md-4">
					<label class="sr-only" for="nome">Cliente</label> <input type="text" class="form-control required" readonly="readonly" name="nome" id="nome" value="<?php echo $a->cliente->nome; ?>">
				</div>
				<div class="form-group col-md-2 pull-right ">
					<label class="sr-only" for="data">Data</label> <input type="text" class="form-control required" style="text-align: center" readonly="readonly" name="data_atendimento" id="data_atendimento" value="<?php echo $a->data_atendimento; ?>">
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">
								Lista de Serviços
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
									</tr>
								</thead>
								<tbody>
								
								<?php
									
									foreach ( $a->servicos as $row ) {
										?>
										<tr>
											<td><?php echo $row->id;?></td>
											<td><?php echo $row->nome;?></td>
											<td><?php echo $row->quantidade;?></td>
											<td><?php echo $row->total;?></td>
										</tr>
									<?php
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">
								Lista de Produtos
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
									</tr>
								</thead>
								<tbody>
									<?php
									
									foreach ( $a->produtos as $row ) {
										?>
										<tr>
											<td><?php echo $row->id;?></td>
											<td><?php echo $row->nome;?></td>
											<td><?php echo $row->quantidade;?></td>
											<td><?php echo $row->total;?></td>
										</tr>
									<?php
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-2  pull-right">
					<label class="control-label" for="nome">Total</label> <input type="text" class="form-control money required" style="text-align: center" readonly="readonly" name="total" id="total" value="<?php echo $a->total; ?>">
				</div>
				<div class="form-group col-md-2  pull-right">
					<label class="control-label" for="nome">Desconto</label> <input type="text" class="form-control money" style="text-align: center" readonly="readonly" name="desconto" id="desconto" value="<?php echo $a->desconto; ?>">
				</div>
				<div class="form-group col-md-2 pull-right">
					<label class="control-label" for="nome">Sub-Total</label> <input type="text" class="form-control money required" readonly="readonly" name="subtotal" id="subtotal" value="<?php echo $a->subtotal; ?>">
				</div>
			</div>
		
		</div>
	</div>
	<a href="index.php" class="label label-default">voltar</a>
</div>
<?php
include ROOT . 'views/template/footer.php';
?>
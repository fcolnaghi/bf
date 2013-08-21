<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<a class="navbar-brand" href="#">Beutiful Faces</a>
		<div class="collapse navbar-collapse bs-js-navbar-collapse">
			<ul class="nav navbar-nav">
				<li class="dropdown"><a id="drop1" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Cadastros <b class="caret"></b></a>
					<ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
						<li><a role="menuitem" tabindex="-1" href="<?php echo ROOT?>views/clientes/index.php">Clientes</a></li>
						<li><a role="menuitem" tabindex="-1" href="<?php echo ROOT?>views/produtos/index.php">Produtos</a></li>
						<li><a role="menuitem" tabindex="-1" href="<?php echo ROOT?>views/servico/index.php">Servi&ccedil;os</a></li>
					</ul>
				</li>
				<li class="dropdown"><a href="#" id="drop2" role="button" class="dropdown-toggle" data-toggle="dropdown">Relat&oacute;rios <b class="caret"></b></a>
					<ul class="dropdown-menu" role="menu" aria-labelledby="drop2">
						<li><a role="menuitem" tabindex="-1" href="<?php echo ROOT?>">Faturamento</a></li>
						<li><a role="menuitem" tabindex="-1" href="<?php echo ROOT?>">Atendimento por Data</a></li>
					</ul>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown"><a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown">Sistema <b class="caret"></b></a>
					<ul class="dropdown-menu" role="menu" aria-labelledby="drop3">
						<li><a role="menuitem" tabindex="-1" href="#">Desconectar</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>

<?php
header("Content-Type: text/html; charset=utf-8",true) ;
include("conexao.php");

$query=mysqli_query($_SESSION['conexao'],"SELECT * FROM pedidos ORDER BY cod_pedido ASC");

$linhas = mysqli_num_rows($query);
?>
<!DOCTYPE HTML>

<html>
<head>
	<title>Pedidos</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
	<script src="js/jquery.min.js"></script>
	<script src="js/skel.min.js"></script>
	<script src="js/skel-layers.min.js"></script>
	<script src="js/init.js"></script>
	<link rel="stylesheet" href="css/bootstrap.css" />
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="estilo/table_jui.css" />
	<link rel="stylesheet" href="estilo/jquery-ui-1.8.4.custom.css" />
	<script type="text/javascript" src="js/jquery.mim.js"></script>
	<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			oTable = $('#example').dataTable({
				"bPaginate": true,
				"bJQueryUI": true,
				"sPaginationType": "full_numbers"
			});
		});
	</script>
	<noscript>
		<link rel="stylesheet" href="css/skel.css" />
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/style-desktop.css" />
	</noscript>
</head>
<body>
	<div id="header-wrapper">
		<div class="container">
			<div class="row">
				<div class="12u">

					<header id="header">
						<h1><a href="#" id="logo">Pedidos</a></h1>
						<nav id="nav">
							<a href="index.html">Home</a>
							<a href="Pedidos.php" class="current-page-item">Pedidos</a>
							<a href="clientes.html">Clientes</a>
						</nav>
					</header>
					
				</div>
			</div>
		</div>
	</div>
	<div id="main">
		<div class="container">
			<div class="row main-row">
				<div class="12u">
					<section>
						<h2>Pedidos</h2>
						<form class="form-horizontal" id="form" method="Post"  action = "cadastra_pedido.php">
							<fieldset>
								<legend>Cadastro de pedidos</legend>
								<div class="form-group">
									<label for="usr">Data</label>
									<input id="data" name="data" class="form-control" value="<?php echo $data=date("d/m/Y");?>" placeholder="placeholder" type="text" readonly width="50px">
								</div>
								<div class="form-group">
									<label for="usr">Produtos</label>
									<input type="text" class="form-control" id="produtos" name="produtos">
								</div>
								<div class="form-group">
									<label for="usr">Cliente</label>
									<input type="text" class="form-control" id="cliente" name="cliente">
								</div>
								<!-- Select Tipo-->
								<div class="form-group">
									<label class="control-label" for="selectbasic">Tipo</label>
									<div class="controls">
										<select id="idtipo" name="idtipo" class="input-medium" onChange="Calcula_lucro()">
											<?php
											while($row = mysqli_fetch_array($consulta_tipo)){
												$tipo= $row["tipo"];
												$cod_tipo = $row["cod_tipo"];
												echo "<option value='$cod_tipo'>$tipo</option>" ;
											}
											?>  
										</select>
									</div>
								</div>
								<!-- Select Tipo/-->
								<div class="control-group">
									<label class="control-label" for="selectbasic">Forma</label>
									<div class="controls">
										<select id="forma" name="forma" class="input-medium">
											<option value="Dinheiro">Dinheiro</option> 
											<option value="Cartão">Cartão</option>
											<option value="Parcelado">Parcelado</option>
										</select>
										Status
										<select id="status" name="status" class="input-medium">
											<option value="Não enviado">Não enviado</option> 
											<option value="Enviado">Enviado</option>
										</select>
										Situação
										<select id="situacao" name="situacao" class="input-medium">
											<option value="Pago">Pago</option> 
											<option value="Não pago">Não pago</option>
										</select>
									</div>
								</div>
								<!-- Text Valor-->
								<div class="control-group">
									<label class="control-label" for="textinput">Total :</label>
									<div class="controls">
										<input id="total" name="total" type="text" onChange="Calcula_lucro()" onBlur="Calcula_lucro()" class="input-mini">
										Lucro :<input id="lucro" name="lucro" type="text" class="input-mini" readonly>
									</div>
								</div>
								<!-- Botões -->
								<div class="control-group">
									<div class="controls">
										<button id="button1id" name="button1id" class="btn btn-success">Limpar</button>
										<button id="button2id" name="button2id" class="btn btn-danger" type="submit">Salvar</button>
									</div>
								</div>
							</fieldset>
						</form>
					</section>
				</div>
			</div>
		</div>
	</div>
	<div id="main">
		<div class="container">
			<div class="row main-row">
				<div class="12u">
					<section>
						<h2>pedidos</h2>
						<div class="table-responsive">
							<table class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th>Editar</th>
										<th>Código</th>
										<th>Produtos</th>
										<th>Data</th>
										<th>Status</th>
										<th>Pago</th>
										<th>Lucro</th>
										<th>Total</th>
										<th>Excluir</th>
									</tr>
								</thead>
								<tbody>
									<?php
									while($row = mysqli_fetch_array($query)){
										$cod= $row["cod_pedido"];
										$produtos     = $row["produtos"];
										$data      = $row["data_pedido"];
										$status  = $row["status"];
										if($status=="Enviado"){
											$img_sta= "img/send.png"; 
										}else{
											$img_sta = "img/nosend.png"; 
										}
										$pago   = $row["pago"];
										if($pago=="Pago"){
											$img_pag= "img/certo.png"; 
										}else{
											$img_pag = "img/cancel.png"; 
										}
										$total   = $row["total"];
										$lucro   = $row["lucro"];
										echo "
										<tr class='even gradeA'>
										<td class='center'><a href=altera_pedido.php?cod=$cod><img src='img/edit.png' width='18' height='18' /></a></td>
										<td class='center'>$cod</td>
										<td><img src='img/produto.png' width='20' height='20'/> $produtos</td>
										<td class='center'><img src='img/calendar.png' width='18' height='18'/> $data</td>
										<td class='center'><img src='$img_sta' width='18' height='18'/> $status</td>
										<td class='center'><img src='$img_pag' width='18' height='18'/> $pago</td>
										<td class='center'>R$$lucro</td>
										<td class='center'>R$$total</td>
										<td class='center'><a href='deleta_pedido.php?cod=$cod'><img src='img/delete.png' width='18' height='18' /></a></td>
										</tr>";
									}
									?>
								</tbody>
							</table>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="12u">

			<div id="copyright">
				&copy; Untitled. All rights reserved. | Design: <a href="http://html5up.net">HTML5 UP</a>
			</div>

		</div>
	</div>
</div>
</div>
</body>
</html>
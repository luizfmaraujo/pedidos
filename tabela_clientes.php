<h2>Clientes</h2>
<?php
include("conexao.php");

$query=mysqli_query($_SESSION['conexao'],"SELECT * FROM clientes ORDER BY nome ASC");

$linhas = mysqli_num_rows($query);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

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
</head>
<body>
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	<thead>
		<tr>
			<th>Editar</th>
			<th>Código</th>
			<th>Nome</th>
			<th>Telefone</th>
			<th>Referência</th>
			<th>Excluir</th>
		</tr>
	</thead>
	<tbody>

		
		<?php
		while($row = mysqli_fetch_array($query)){
		$cod= $row["cod_cliente"];
		$nome    = $row["nome"];
		$telefone      = $row["telefone"];
		$referencia  = $row["referencia"];
		echo "
		<tr class='even gradeB'>
		<td class='center'><a href=altera_cliente.php?cod=$cod><img src='img/edit.png' width='18' height='18' /></a>
		</td>
		<td class='center'>$cod</td>
		<td class='center'><img src='img/cliente.png' width='20' height='20'/> $nome</td>
		<td class='center'><img src='img/telefone.png' width='20' height='20'/> $telefone</td>
		<td class='center'>$referencia</td>
		<td class='center'><a href='deleta_cliente.php?cod=$cod'><img src='img/delete.png' width='18' height='18' /></a></td>
		</tr>";
		}
		?>	
	</tbody>
	
</table>
</body>
</html>
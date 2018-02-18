<h2>Pedidos</h2>
<?php
header("Content-Type: text/html; charset=utf-8",true) ;
include("conexao.php");

$query=mysqli_query($_SESSION['conexao'],"SELECT * FROM pedidos ORDER BY cod_pedido ASC");

$linhas = mysqli_num_rows($query);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Exemplo DataTables</title>
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
</body>
</html>
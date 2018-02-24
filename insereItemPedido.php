<?php
	
	include('conexao.php');
	$itens = $_GET['itens'];	
	
	$dados = json_decode($itens);

	//cria o array de itensPedido
	$itensPedido = $dados->itens;

	foreach ( $itensPedido as $ip )	
	{
	    //echo "nome: $ip->Tipo - idade: $ip->Quantidade - sexo: $ip->Produto<br/>";
		$produto = $ip->Produto;
		$tipo = $ip->Tipo;
		$quantidade = $ip->Quantidade;
		$subtotal = $ip->Subtotal;
		$preco = $ip->Preço;
		$num_pedido = $ip->Pedido;

		$sql = "INSERT INTO item_pedido (descricao, quantidade, preco, subtotal, cod_pedido) VALUES ('$produto', '$quantidade', '$preco','$subtotal','$num_pedido')";
		$result = mysqli_query($_SESSION['conexao'],$sql); 
		if ($result = null) {
			echo "Erro na inserção do item";
		} 
	}
		echo "itens inseridos com sucesso!!!";
?>
<?php
echo "teste";
$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'nayara';
$link = mysqli_connect($servidor,$usuario,$senha,$banco);

$jsondata = file_get_contents('table.json');
$data = json_decode($jsondata, true);

echo $data;

//$stmt = $db->prepare("insert into item_pedido values(?,?)");

//foreach ($data['retorno']['produtos'] as $row) {
//	$stmt->bindParam(1, $row['produto']['codigo']);
//	$stmt->bindParam(2, $row['produto']['estoqueAtual']);
  //  $stmt->bindParam(1, $row['produto']['codigo']);
	//$stmt->execute();
//}
?>



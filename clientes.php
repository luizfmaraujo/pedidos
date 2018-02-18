<?php
header("Content-Type: text/html; charset=utf-8",true) ;
include("conexao.php");

$consulta=mysqli_query($_SESSION['conexao'],"Select cod_cliente,nome from clientes By ASC");
echo $sconsulta; 
?>
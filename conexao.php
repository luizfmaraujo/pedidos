<?php 
	//include("seguranca.php");
	//protegePagina();
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
	$servidor = 'localhost';
	$usuario = 'root';
	$senha = '';
	$banco = 'nayara';
	$link = mysqli_connect($servidor,$usuario,$senha,$banco);
	$_SESSION['conexao'] = $link;
	if (!$link) {
		echo "erro na conexão";
	} elseif(!mysqli_select_db($link,$banco)) {
		echo "Erro na seleção do BD";
	}
?>

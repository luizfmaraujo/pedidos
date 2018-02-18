<?php
  /**
   * função que devolve em formato JSON os dados do cliente
   */
  function retorna( $codigo, $db )
  {
    $sql = "SELECT `cod_cliente`, `nome` 
      FROM `cliente` WHERE `cod_cliente` = '{$codigo}' ";

    $query = $db->query( $sql );

    $arr = Array();
    if( $query->num_rows )
    {
      while( $dados = $query->fetch_object() )
      {
        $arr['nome'] = $dados->nome;
      }
    }
    else
      $arr['nome'] = 'não encontrado';

    return json_encode( $arr );
  }

/* só se for enviado o parâmetro, que devolve os dados */
if( isset($_GET['codigo']) )
{
  $db = new mysqli('localhost', 'root', '', 'nayara');
  echo retorna( filter ( $_GET['codigo'] ), $db );
}

function filter( $var ){
  return $var;//a implementação desta, fica a cargo do leitor
}
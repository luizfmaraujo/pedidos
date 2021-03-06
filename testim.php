<?php
header("Content-Type: text/html; charset=utf-8",true) ;
include("conexao.php");

$consulta=mysqli_query($_SESSION['conexao'],"Select Max(cod_pedido) as maior_codigo from pedidos");
$numeroPedido = $consulta + 1; 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Exemplo DataTables</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script type="text/javascript" src="js/jquery-1.8.3.min.js" charset="UTF-8"></script>
    <script type="text/javascript" src="js/jquery.tabletojson.min.js" charset="UTF-8"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("input[name='codigoCliente']").blur(function(){
                var $cliente = $("input[name='cliente']");

                $cliente.val('Carregando...');

                $.getJSON(
                    'function.php',
                    { codigo: $( this ).val() },
                    function( json )
                    {
                        $cliente.val( json.nome );
                    }
                    );
            });
        });
        (function($) {
            removeLinhaTabela = function(handler) {
                var tr = $(handler).closest('tr');
                tr.fadeOut(400, function(){ 
                    tr.remove(); 
                }); 
                limpaItem();
                calculaTotal();
                return false;
            };
            adicionaLinhaTabela = function() {
                if(validaItem()){
                    var codigoItem = retornaUltimoCodigo() + 1;
                    var newRow = $("<tr>");
                    var cols = "";
                    cols += '<td width="3%">';
                    cols += '<button class="btn btn-large btn-danger" onclick="removeLinhaTabela(this)" type="button">Remover</button>';
                    cols += '</td>';
                    cols += '<td width="40" class="tabelaPedido" style="text-align:center">'+$("#codigo").val();+'</td>';
                    cols += '<td width="40" class="tabelaCodigo" style="text-align:center">'+codigoItem+'</td>';
                    cols += '<td width="240" class="tabelaDescricao">' + $("#descricao").val() + '</td>';
                    cols += '<td width="40" class="tabelaTipo" style="text-align:center">' + $("#tipo").val() + '</td>';
                    cols += '<td width="40" class="tabelaQuantidade"style="text-align:center">' + $("#quantidade").val() + '</td>';
                    cols += '<td width="100" class="tabelaPreco">' + $("#preco").val() + '</td>';
                    cols += '<td width="100" class="tabelatotalparcial">' + $("#subtotal").val() + '</td>';
                    newRow.append(cols);
                    $("#tabelaItens").append(newRow);
                    calculaTotal();
                    limpaItem();
                    validaItem();
                    return false;
                }
            }; 
            gravaItensPedido = function(){
              var tabela = $('#tabelaItens').tableToJSON();
              var dadosTabela = JSON.stringify(tabela);
              //dados = dados.replace("[","");
              //dados = dados.replace("]","");
              var itensPedido = '{"itens":'+dadosTabela+'}';
              console.log(itensPedido);
              $("#retorno").load("insereItemPedido.php?itens="+itensPedido); 
          };
          calculaSubTotal = function() {
            var quantidade = $("#quantidade").val();
            var preco = $("#preco").val();
            var totalparcial = 0;
            totalparcial = quantidade * preco;
            totalparcial= totalparcial.toFixed(2);
            $("#subtotal").val(totalparcial);
        };
        calculaTotal = function() {
            var valorCalculado = 0;
            var desconto = $("#desconto").val();
            $( ".tabelatotalparcial" ).each(function() {
                valorCalculado += parseFloat($( this ).text());
            });
            valorCalculado = valorCalculado-desconto;
            $( "#total" ).val(valorCalculado.toFixed(2));
        };
        limpaItem = function() {
            $( "#descricao" ).val("");
            $("#tipo").val("");
            $( "#quantidade" ).val("1");
            $( "#preco" ).val("");
            $( "#subtotal" ).val("");
        };
        validaItem = function() {
            $( "#mensagens" ).css( "display", "block" );
            if($( "#descricao" ).val() == ""){
                $( "#descricao" ).focus();
                $("#mensagem").html("O campo Descrição deve ser preenchido");
                return false;
            }if($( "#preco" ).val() == ""){
                $( "#preco" ).focus();
                $("#mensagem").html("O campo Preço deve ser preenchido");
                return false;
            }if($( "#quantidade" ).val() == ""){
                $( "#quantidade" ).focus();
                $("#mensagem").html("O campo Quantidade deve ser preenchido");
                return false;
            }
            else{
                $( "#mensagens" ).css( "display", "none" );
                return true;
            }
        };
        retornaUltimoCodigo = function(){
            var codigo = $("#codigoItem").text();
            codigo = parseInt(codigo);
            if(codigo > 0){
                return codigo;
            } else {
                return 0;
            }
        };
    })(jQuery);
</script>
</head>
<body>
    <h2>Pedidos</h2>
    <legend>Cadastro de pedidos</legend>
    <form class="form-horizontal" id="form" method="Post"  action = "cadastra_pedido.php">
        <div class="row">
            <div class="col-md-1 col-xs-1">
                <div class="form-group">
                    <label for="unidadeVolume">Código:</label>
                    <input type="text" class="form-control" value="<?php echo $numeroPedido?>"name="codigo" id="codigo" readonly>
                </div>
            </div>
            <div class="col-md-2 col-xs-2">
                <div class="form-group">
                    <label for="unidadeVolume">Data:</label>
                    <input type="text" class="form-control" value="<?php echo $data=date("d/m/Y");?>" name="data" id="data" readonly>
                </div>
            </div>
            <div class="col-md-1 col-xs-1">
                <div class="form-group">
                    <label for="volumeBolsa">Cód Cliente:</label>
                    <input type="text" class="form-control" id="codigoCliente" name="codigoCliente">
                </div>
            </div>
            <div class="col-md-3 col-xs-3">
                <div class="form-group">
                    <label for="volumeBolsa">Cliente:</label>
                    <input type="text" class="form-control" id="cliente" name="cliente" placeholder="Nome do Cliente" required>
                    <input class="btn btn-large" type="button" value="Buscar">
                </div>
            </div>
            <div class="col-md-2 col-xs-2">
                <div class="form-group">
                    <label for="unidadeVolume">Status:</label>
                    <select class="form-control" data-size="5" data-width="100%" id="staus" name="status" required>
                        <option selected disabled>Escolha uma opção</option>
                        <option>Enviado</option>
                        <option>Não enviado</option>
                    </select>           
                </div>
            </div>
            <div class="col-md-2 col-xs-2">
                <div class="form-group">
                    <label>Forma de Pagamento:</label>
                    <select class="form-control" data-size="5" data-width="100%" id="forma" name="forma" required>
                        <option>Dinheiro</option>
                        <option>Cartão</option>
                        <option>Parcelado</option>
                    </select>           
                </div>
            </div>
        </div>
        <legend>Itens</legend>
        <div class="row">
            <div class="col-md-4 col-xs-4">
                <div class="form-group">
                    <label>Descrição:</label>
                    <input type="text" class="form-control" id="descricao">
                </div>
            </div>
            <div class="col-md-2 col-xs-2">
                <div class="form-group">
                    <label>tipo</label>
                    <select class="form-control" data-size="5" data-width="100%" id="tipo" name="tipo">
                        <option>Jóias</option>
                        <option>Natura</option>
                        <option>Avon</option>
                    </select>           
                </div>
            </div>
            <div class="col-md-1 col-xs-1">
                <div class="form-group">
                    <label>Quantidade:</label>
                    <input type="number" value="1" min="1" onChange="calculaSubTotal()" onBlur="calculaSubTotal()" class="form-control" name="quantidade" id="quantidade">
                </div>
            </div>
            <div class="col-md-1 col-xs-1">
                <div class="form-group">
                    <label>Preço:</label>
                    <input type="number" onChange="calculaSubTotal()" onBlur="calculaSubTotal()" class="form-control" name="preco" id="preco">
                </div>
            </div>
            <div class="col-md-1 col-xs-1">
                <div class="form-group">
                    <label>Subtotal:</label>
                    <input type="number" class="form-control" name="subtotal" id="subtotal" readonly>
                </div>
            </div>
            <div class="col-md-1 col-xs-1">
                <div class="form-group">
                    <label>.</label>
                    <p><a class="btn btn-primary" onclick="adicionaLinhaTabela();" role="button">Adicionar</a></p>
                </div>
            </div>
        </div>
        <div id="mensagens" style="display:block;">
            <label id="mensagem"  style="color:red;">Preencha todos os campos do item</label>
        </div>
        <!--Tabela-->
        <div class="table-responsive">
            <table id="tabelaItens" class="table table-striped table-bordered table-hover">
                <tbody>
                    <tr>
                        <th style="text-align:center">Excluir</th>
                        <th style="text-align:center">Pedido</th>
                        <th style="text-align:center">Código</th>
                        <th>Produto</th>
                        <th style="text-align:center">Tipo</th>
                        <th style="text-align:center">Quantidade</th>
                        <th style="text-align:center">Preço</th>
                        <th style="text-align:center">Subtotal</th>
                    </tr>   
                </tbody>
            </table>
            <table id="tabelaTotalDesconto" class="table table-striped table-bordered table-hover">
                <tfoot>
                    <tr>
                        <td colspan="7" style="text-align: right;font-size: 25px">
                            <label>Desconto</label>
                            <input type="number" style="width:145px;color: red" value="0" id="desconto" name="desconto" onChange="calculaTotal()" onBlur="calculaTotal()"/>
                            <label>Total:</label>
                            <input type="number" style="width:145px;" id="total" name="total" readonly/>
                        </td>
                    </tr>
                </tfoot>
            </table> 
        </div>
        <!-- Botões -->
        <div class="control-group" style="float: right;">
            <div class="controls" >
                <button id="button1id" name="button1id" class="btn btn-danger" >Limpar Pedido</button>
                <button id="button2id" name="button2id" class="btn btn-success" type="submit">Salvar</button>
            </div>
        </div>
    </form>
    <div id="retorno"></div>
</body>
</html>

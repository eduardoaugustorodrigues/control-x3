<?php 
require_once('../Shared/_Layout.php');
Autentication();
include('../CampoExibir/clienteCampos.txt');
echo topo($titleClienteList);
?>
<div id="Stats"></div>
<div id="painelInterno">
<fieldset class="form-horizontal">
      <legend><?php echo $tituloCrudClienteList; ?></legend>
<p class="cad">
    <a href="<?php Action("add.php?TB_iframe=true&height=580&width=880", "../Cliente") ?>" class="btn btn-primary thickbox" title="<?php echo $adicionarTitleClienteList; ?>"><?php echo $adicionarClienteList; ?></a>
</p> 

<?php
$re = mysql_query("SELECT count(*) as total `usuario`.* FROM `usuario` INNER JOIN `usuario_tipo` ON `usuario`.`id` = `usuario_tipo`.`usuarioid` and usuario_tipo.tipo='4'");
@$total = mysql_result($re, 0, "total");
//inicio do sistema de paginação
$pagina = 0;
if(isset($_GET["pagina"])) {

$pagina = $_GET["pagina"];

}
//limite de clientes a serem mostrados por paginas

$limite = 30;

@$paginas = ceil($total / $limite);

$inicio = $pagina * $limite; 


$cor = "query-mostra-claro";
if($_GET['q']=="0" or $_GET['q']==""){
	$sql="SELECT `usuario`.* FROM `usuario` INNER JOIN `usuario_tipo` ON `usuario`.`id` = `usuario_tipo`.`usuarioid` and usuario_tipo.tipo='4' ORDER BY `usuario`.`nome` ASC LIMIT $inicio, $limite";
}else{
	$sql="SELECT `usuario`.* FROM `usuario` INNER JOIN `usuario_tipo` ON 
		  `usuario`.`id` = `usuario_tipo`.`usuarioid` and usuario_tipo.tipo='4' and nome  like '%".$_GET['q']."%' or 
		  `usuario`.`id` = `usuario_tipo`.`usuarioid` and usuario_tipo.tipo='4' and fone1 like '%".$_GET['q']."%' or 
		  `usuario`.`id` = `usuario_tipo`.`usuarioid` and usuario_tipo.tipo='4' and fone2 like '%".$_GET['q']."%' or 
		  `usuario`.`id` = `usuario_tipo`.`usuarioid` and usuario_tipo.tipo='4' and fone3 like '%".$_GET['q']."%' or 
		  `usuario`.`id` = `usuario_tipo`.`usuarioid` and usuario_tipo.tipo='4' and fone4 like '%".$_GET['q']."%' or 
		  `usuario`.`id` = `usuario_tipo`.`usuarioid` and usuario_tipo.tipo='4' and cpf_cnpjf like '%".$_GET['q']."%'
		  ORDER BY `usuario`.`nome` ASC LIMIT $inicio, $limite";
}
$rs= mysql_query($sql)or die(mysql_error());
$quantidade = mysql_num_rows($rs);
$controlerBuscarInfor = "../Controller/clienteControler.php";
include('../Controller/busca.php');
?>

		<table id="cadastrolista" class="roundborder">
			<thead class="<?php echo $theadCridClienteList; ?>">
            	<tr>
                	<th><?php echo $codigoAutomaticoList; ?></th>
                	<th><?php echo $nomeClienteList; ?></th>
                    <th><?php echo $pessoaFisicaList;?></th>
                    <th><?php echo $pessoaJuridicaList;?>
                    
                    <th><?php echo $cpfcnpjClienteList; ?></th>
                    <th><?php echo $fone1ClienteList; ?></th>
                    <th><?php echo $historicoVenClienteList; ?></th>
                    <th style="width:190px;"><?php echo $acoesGridClienteList; ?></th>
                </tr>
			</thead>
		<?php
		$rs= mysql_query($sql)or die(mysql_error());
		while($linha = mysql_fetch_array($rs)){
		?>            
			<tbody>
            	<tr>
                    <td><?php echo $linha["id"] ?></td>
                    <td><?php echo $linha["nome"] ?></td>
                    <td><?php echo $linha["cpf_cnpjf"] ?></td>
                    <td><?php echo $linha["fone1"].' '.$linha["fone2"].' '.$linha["fone3"].' '.$linha["fone4"].' ' ?></td>
                    <td><a href="<?php Action("detalhes.php?id=".$linha['id']."&TB_iframe=true&height=580&width=880", "../Cliente") ?>" class="btn btn-success btn-mini thickbox" title="<?php echo $histoTitleGridClienteList ?>"><?php echo $listaVendaGridClienteList; ?></a></td>
                    <td>
                        <a href="<?php Action("detalhes.php?id=".$linha['id']."&TB_iframe=true&height=580&width=880", "../Cliente") ?>" class="btn btn-success btn-mini thickbox" title="<?php echo $listaTitleGridClienteList ?>"><?php echo $listaGridClienteList; ?></a>
                        <a href="<?php Action("add.php?id=".$linha['id']."&TB_iframe=true&height=580&width=880", "../Cliente") ?>" class="btn btn-primary btn-mini thickbox" title="<?php echo $editaTitleGridClienteList ?>"><?php echo $editaGridClienteList; ?></a>
                        <a href="<?php Action("del.php?id=".$linha['id']."&TB_iframe=true&height=580&width=880", "../Cliente") ?>" class="btn btn-danger btn-mini thickbox" title="<?php echo $removTitleGridClienteList ?>"><?php echo $removGridClienteList; ?></a>
                    </td>
                </tr>
		<?php
		}
		?>            
			</tbody>
       </table>
    <?php 
	$backgroundPagina = $corDaPaginacaoClienteList;
	include('../Controller/paginacao.php');
	?>
</fieldset>
</div>
<?php
echo rodape();
?>
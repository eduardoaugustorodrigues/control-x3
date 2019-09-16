<?php 
require_once('../Shared/_Layout.php');
Autentication();
echo topo('OS online');
?>
<div id="painelInterno">
<fieldset class="form-horizontal">
      <legend>Os online</legend>
<p class="cad">
    <a href="<?php Action("add.php?TB_iframe=true&height=580&width=880", "../Os online") ?>" class="btn btn-primary thickbox" title="Adicionar nova maquina">Adicionar novo maquina</a>
</p>      
		<table id="cadastrolista" class="roundborder">
			<thead class="bgyellow">
            	<tr>
                	<th>Cliente</th>
                    <th>A partir de</th>
                    <th>Valido até</th>
                    <th>Ocorrencias</th>
                    <th style="width:190px;">A&ccedil;&otilde;es</th>
                </tr>
			</thead>
		<?php
		$sql="select id, nome, fone1, fone2, fone3, fone4, email, tipo from usuario";
		$rs= mysql_query($sql)or die(mysql_error());
		while($linha = mysql_fetch_array($rs)){
			$cont = $cont +1;
		?>            
			<tbody>
            	<tr>
                    <td><?php echo $linha["cliente"] ?></td>
                    <td><?php echo $linha["a parti de"] ?></td>
                    <th><?php echo $linha["valido até"] ?></td>
                    <th><?php echo $linha["ocorrencias"]?></td>
                    <td>Maquina <?php echo $cont ?> <a href="#" class="btn btn-primary btn-mini thickbox" title="Editar este registro">Criar OS</a></td>
                    <td>
                        <a href="<?php Action("detalhes.php?id=".$linha['id']."&TB_iframe=true&height=580&width=880", "../OSoONLINE") ?>"/os online") ?>" class="btn btn-success btn-mini thickbox" title="Listar todos os dados deste registro">Listar</a
                        <a href="<?php Action("add.php?id=".$linha['id']."&TB_iframe=true&height=580&width=880", "../OS ONLINE") ?>" class="btn btn-primary btn-mini thickbox" title="Editar este registro">Editar</a>
                        <a href="<?php Action("del.php?id=".$linha['id']."&TB_iframe=true&height=580&width=880", "../OS  ONLINE") ?>" class="btn btn-danger btn-mini thickbox" title="Excluir este registro">Remover</a>
                    </td>
                </tr>
		<?php
		}
		?>            
			</tbody>
       </table>
      
</fieldset>
</div>
<?php
echo rodape();
?>
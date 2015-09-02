<?php
    require_once("cabecalho.php");
    require_once("conecta.php");
    require_once("logica-usuario.php");
    require_once("autoload.php");
           
    verificaUsuario();

    $daoVendedor = new UsuarioDAO($conexao);
    $daoIndicador = new IndicadorDao($conexao);
    $daoMeta = new MetaDao($conexao);
    
    $meta = $daoMeta->buscaMeta($_GET['id']);
	
    $listaDeIndicadores = $daoIndicador->listaIndicadores();
    $listaDeVendedores =  $daoVendedor->listaUsuarios();
?>
   
<form action = "altera-meta.php" method = "Post">
	 
    <div class="panel-heading panel-primary"><h3>Alterar Metas</h3></div>
    
    <div class="form-group">
            
        <input type = "hidden" name = "id" value = "<?=$meta->getId()?>">
    
    </div>
    	
    <div class="form-group">
    
        <select name="indicador_id" class="form-control">
        
            <?php 
				foreach($listaDeIndicadores as $indicadorAtual) : 
               	    $esseEhOIndicador = $meta->getIndicador()->getId()==$indicadorAtual->getId();
			        $selecao = $esseEhOIndicador ? "selected='selected'" : "";
            ?>
            	<option value="<?=$indicadorAtual->getId()?>"<?=$selecao?>><?=$indicadorAtual->getNome()?></option>
            	<?php endforeach ?>
        
        </select>
        
    </div>
    
      <div class="form-group">
    
        <select name="vendedor_id" class="form-control">
        
            <?php 
				foreach($listaDeVendedores as $vendedorAtual) : 
               	    $esseEhOVendedor = $meta->getVendedor()->getId()==$vendedorAtual->getId();
			        $selecao = $esseEhOVendedor ? "selected='selected'" : "";
            ?>
            	<option value="<?=$vendedorAtual->getId()?>"<?=$selecao?>><?=$vendedorAtual->getNome()?></option>
            	<?php endforeach ?>
        
        </select>
        
    </div>
    
    <?php include("meta-formulario-base.php");?>
    
    
    
</form>
 
<?php include("rodape.php")?>







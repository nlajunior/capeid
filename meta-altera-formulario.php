<?php
    require_once("cabecalho.php");
    require_once("logica-usuario.php");
    require_once("banco-usuario.php");
    require_once("banco-indicador.php");
     require_once("banco-meta.php");
       
    verificaUsuario();
    
    $id = $_GET['id'];
    $meta = buscaMeta($conexao,$id);
	
	$usuarios = listaUsuarios($conexao);
    $indicadores = listaIndicadores($conexao);
?>
   
<form action = "altera-meta.php" method = "Post">
	
    <div class="form-group">
            
        <input type = "hidden" name = "id" value = "<?=$meta['id']?>">
    
    </div>
	   	 		
    <?php include("meta-formulario-base.php");?>
	 
</form>
 
<?php include("rodape.php")?>







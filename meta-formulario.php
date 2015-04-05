<?php
    require_once("cabecalho.php");
    require_once("logica-usuario.php");
    require_once("banco-usuario.php");
    require_once("banco-indicador.php");
        
   
    verificaUsuario();
    
    $meta = array("valorplanejado"=>"", "valorexecutado"=>"", "mes"=>"", "indicador_id"=>"0","usuario_id"=>"0");
    

    $usuarios = listaUsuarios($conexao);
    $indicadores = listaIndicadores($conexao);?>


<form action = "adiciona-meta.php" method = "Post">
    
       <?php include ("meta-formulario-base.php")?>
</form>
 
<?php include("rodape.php")?>

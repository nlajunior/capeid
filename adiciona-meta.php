<?php
    require_once("cabecalho.php");
    require_once("conecta.php");
    
    require_once("autoload.php");
    /*require_once("logica-usuario.php");*/
?>
<?php
    verificaUsuario();

    $meta = new Meta();
    $indicador = new Indicador();
    $vendedor = new Usuario();
    $dao = new MetaDao($conexao);
    
    $meta->setValorPlanejado($_POST["valorplanejado"]);
    $meta->setValorExecutado($_POST["valorexecutado"]);
    
    
        
    $meta->setMes($_POST["mesAno"]);
    $meta->setAno($_POST["mesAno"]);
    
    $indicador->setId($_POST["indicador_id"]);
    $vendedor->setId($_POST["usuario_id"]);

    $meta->setIndicador($indicador);
    $meta->setVendedor($vendedor);
    
    $pusuario_id = $meta->getVendedor()->getId();
    $pmes = $meta->getMes();
    $pano = $meta->getAno();  

    if($dao->insereMeta($meta)){
        
    header("Location:consulta-vendedor.php?usuario_id=$pusuario_id&mes=$pmes&ano=$pano");
    } 
         
    else {
        $msg = mysqli_error($conexao);
            ?>
       
	    <p class="text-danger"> A meta não foi adicionada com sucesso<?=$msg ?></p>
            <?php
            }
            ?>
<?php include("rodape.php")?>

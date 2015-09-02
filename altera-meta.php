<?php
    include("cabecalho.php");
    include("conecta.php");
    require_once("autoload.php")
?>
<?php
    verificaUsuario();

    $dao = new MetaDao($conexao);
    $meta = new Meta();
    $indicador = new Indicador();
    $vendedor = new Usuario();
    $dao = new MetaDao($conexao);

    $meta->setId($_POST["id"]);
    $meta->setValorPlanejado($_POST["valorplanejado"]);
    $meta->setValorExecutado($_POST["valorexecutado"]);
    
    $meta->setMes($_POST["mesAno"]);
    $meta->setAno($_POST["mesAno"]);
    
    $indicador->setId($_POST["indicador_id"]);
    $vendedor->setId($_POST["vendedor_id"]);
     
    $meta->setIndicador($indicador);
    $meta->setVendedor($vendedor);
    
    $pusuario_id = $_POST["vendedor_id"];
    $pmes = $meta->getMes();
    $pano = $meta->getAno();
       
     
   	if($dao->alteraMeta($meta)) {
	    header("Location:consulta-vendedor.php?usuario_id=$pusuario_id&mes=$pmes&ano=$pano");
    } else {
            $msg = mysqli_error($conexao);
            ?>
	    <p class="text-danger"> A meta não foi alterada!<?=$msg ?></p>
            <?php
            }
            ?>
<?php include("rodape.php")?>

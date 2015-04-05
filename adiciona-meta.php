<?php
    require_once("cabecalho.php");
    require_once("banco-meta.php");
    require_once("logica-usuario.php");
?>
<?php
    verificaUsuario();

    $valorplanejado = $_POST["valorplanejado"];
    $valorexecutado = $_POST["valorexecutado"];
    $mes            = $_POST["mes"];
    $indicador_id   = $_POST["indicador_id"];
    $usuario_id     = $_POST["usuario_id"];
    
      
    if(insereMeta($conexao, $valorplanejado, $valorexecutado, $mes, $indicador_id, $usuario_id)){
        
        Header("Location:meta-lista.php");
    } 
         
    else {
        $msg = mysqli_error($conexao);
            ?>
       
	    <p class="text-danger"> A meta não foi adicionada com sucesso<?=$msg ?></p>
            <?php
            }
            ?>
<?php include("rodape.php")?>

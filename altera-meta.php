<?php
    include("cabecalho.php");
    include("conecta.php");
    include("banco-meta.php");
?>
<?php
    verificaUsuario();

    $id             =                $_POST["id"];
    $valorplanejado = $_POST["valorplanejado"];
    $valorexecutado = $_POST["valorexecutado"];
    $mes = $_POST["mes"];
    $indicador_id =$_POST["indicador_id"];
    $usuario_id=$_POST["usuario_id"];
    
     
   	if(alteraMeta($conexao, $id,  $valorplanejado, $valorexecutado, $mes, $indicador_id, $usuario_id)) {
	    header("Location:meta-lista.php?usuario_id=$usuario_id");
    } else {
            $msg = mysqli_error($conexao);
            ?>
	    <p class="text-danger"> O vídeo <?=$titulo;?> não foi alterado!<?=$msg ?></p>
            <?php
            }
            ?>
<?php include("rodape.php")?>

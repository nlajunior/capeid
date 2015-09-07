<?php

    require_once("cabecalho.php");
    /*require_once("logica-usuario.php");*/
    require_once("conecta.php");
    require_once("autoload.php");
    
    verificaUsuario();
    
    $meta = new Meta();
    $daoVendedor = new UsuarioDAO($conexao);
    $daoIndicador = new IndicadorDao($conexao);

    $listaDeIndicadores = $daoIndicador->listaIndicadores();
    $listaDeVendedores = $daoVendedor->listaUsuarios();?>

<form action = "adiciona-meta.php" method = "Post">
  
   <div class="panel-heading panel-primary"><h3>Adicionar Metas</h3></div>
   
   
            <div class="form-group">
            
                <input type = "hidden" name = "id" value = "<?=$meta->getId()?>">
    
            </div>   
            
             <div class="form-group">
                <select name="indicador_id" class="form-control">

                    <option>Escolha um indicador</option>
                    <?php 
                        foreach($listaDeIndicadores as $indicadorAtual) : 
                        ?>      
                            <option value="<?=$indicadorAtual->getId()?>"><?=$indicadorAtual->getNome()?></option>
                        <?php endforeach ?>
                </select>
            </div>
    
    
            <div class="form-group">
           
                <select name = "usuario_id" class = "form-control">	
                    <option>Escolha o vendedor</option>
                    <?php 
                        foreach($listaDeVendedores as $vendedor):
                    ?>
                    <option value  = "<?=$vendedor->getId()?>"><?=$vendedor->getNome()?></option>	
                    <?php endforeach ?>
                </select>
            </div>
        
                    
            <?php include ("meta-formulario-base.php")?>
        
</form>
 
<?php include("rodape.php")?>

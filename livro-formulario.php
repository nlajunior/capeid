<?php

    require_once("cabecalho.php");
    require_once("logica-usuario.php");
    
    require_once("conecta.php");
    require_once("autoload.php");
    
    verificaUsuario();
    
    $Livro = new Livro();
    $dao = new Produto($conexao);
    

   
<form action = "adiciona-livro.php" method = "Post">
   
   <div class="panel-heading panel-primary"><h3>Adicionar Livro</h3></div>
    
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

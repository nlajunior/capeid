<?php require_once("cabecalho.php");?>
<?php require_once("banco-meta.php");?>
<?php require_once("banco-usuario.php");?>


<?php 
    verificaUsuario(); 
    $usuarios = listaUsuarios($conexao);
?>

<div class="panel panel-primary painel">
    
    <div class="panel-heading">Metas </div>
    
        <form  action="meta-lista.php" class="navbar-form navbar-left" role="search" method="GET">
            <div class="form-group">
                        
                <select name = "usuario_id" class = "form-control">	
               
		       <?php 
                    foreach($usuarios as $usuario):
			         
	           ?>
               <option value  = "<?=$usuario['id']?>" <?=$selecao?>>
		          <?=$usuario['nome']?>
		       </option>	
	           <?php endforeach ?>
	           </select>
                
                
            </div>
            
            <div class="btn-group btn-group-sm" role="group">    
                <button type="submit" class="btn btn-primary glyphicon glyphicon-search"></button>
            </div>
        </form>
     
     <table class = "table table-striped table-responsive tabela" >
       <tr>
        <td>Vendedor</td>   
        <td>Indicador</td>
        <td>Planejado</td>
        <td>Realizado</td>
        <td>Resultado</td>
        <td>Opções</td>   
       </tr>
   
        <?php
           if ((isset($_GET["usuario_id"])))
               {
           $id= $_GET['usuario_id']; 
          
               }else{$id=0;
                    }
            $metas = listaMetas($conexao, $id);


           foreach($metas as $meta): ?>
           <tr>
               <td>
                   <?=substr($meta['usuario_nome'],0,20)?>
               
               </td>
               <td>
                <?=$meta['indicador_nome']?>
               </td>

               <td>
                <?= 'R$ '.number_format($meta['planejado'],2,",",".")?>
               </td>

               <td>
                <?= 'R$ '.number_format($meta['executado'],2,",",".")?>
               </td>

               <td>
                <?php if($meta['resultado']<100){?>
                        <p class="text-danger"><?= number_format($meta['resultado'],0,",","") .'%';?></p>
                      <?php } else{?>
                             <p class="text-success" ><?= number_format($meta['resultado'],0,",","") .'%';?></p> <?php }?>
               </td>

               <td>
                <div class="botoes btn-group btn-group-sm">  
                  <a class = "btn btn-success glyphicon glyphicon-plus" href = "meta-formulario.php"></a>
                </div>  

                <div class="botoes btn-group btn-group-sm">    
                  <a class = "btn btn-primary  glyphicon glyphicon-edit" href = "meta-altera-formulario.php?id=<?=$meta['id']?>"></a>
                 </div>   
               </td>
           </tr>   
  
         <?php endforeach ?>
    </table>

    <nav>
      <ul class="pager">
        <li><a href="#">Anterior</a></li>
        <li><a href="#">Próximo</a></li>
      </ul>
    </nav>
</div>
<?php include("rodape.php");?>


<?php require_once ("autoload.php");?>
<?php include_once ("consulta-vendedor.php");?>

<div class="container">
<div class="table-responsive"> 
    
    <table class="table table-striped table-bordered">
        <tr>
            <th></th>  
            <th>Indicador</th>   
            <th>Planejado</th>
            <th>Executado</th>   
            <th>Desempenho</th>
            <th>Mês</th>
            <th>Vendedor</th>
            <th>Ações</th>  
        </tr> 
       
        <?php
         
            $dao = new MetaDao($conexao);

            if ((isset($_GET["usuario_id"]))){
                
                $id=$_GET['usuario_id'];
                $mes = $_GET['mes'];
         
            }else{$id=0; $mes=0;}

            $listaDeMetas = $dao->listaMetas($id,$mes);
		
            foreach($listaDeMetas as $metaAtual) :
            ?>
	           <tr>
                   <td><input type="radio" name="id" id="id" value="<?=$metaAtual->getId();?>"> </td>
                   <td><?= $metaAtual->getIndicador()->getNome();?></td> 
		           <td><?= $metaAtual->getValorPlanejado();?></td>
                   <td><?= $metaAtual->getValorExecutado();?></td>
          
                   <td>
                       <?php
                            if($metaAtual->calculaMeta()<100){?>
                                <p class="text-danger glyphicon glyphicon-thumbs-down"> <?=$metaAtual->calculaMeta();?>
                       <?php } else{?>
                                <p class="text-success glyphicon glyphicon-thumbs-up" > <?=$metaAtual->calculaMeta();?></p> 
                       <?php }?>
     
                  </td>

                  ￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼<td><?=$metaAtual->traduzMes();?></td> 
                  <td><?= substr($metaAtual->getVendedor()->getNome(),0,20);?></td>
         
                  <td>
                    <div class="botoes btn-group btn-group-sm">  
                        <a class = "btn btn-success glyphicon glyphicon-plus" href = "meta-formulario.php"></a>
                    </div>  

                    <div class="botoes btn-group btn-group-sm">    
                        <a class = "btn btn-primary  glyphicon glyphicon-edit" href = "meta-altera-formulario.php?id=<?=$metaAtual->getId()?>"></a>
                    </div>   
                 </td>
	         </tr>
	    <?php endforeach ?>	
    </table>		
</div>

</div>

<nav>
    <ul class="pager">
        <li><a href="#">Anterior</a></li>
        <li><a href="#">Próximo</a></li>
    </ul>
</nav>

<?php include("rodape.php");?>

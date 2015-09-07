<div class="form-group">

    <input class = "form-control" type = "text" id = "valorplanejado" name="valorplanejado"  value = "<?=$meta->getValorplanejado()?>" placeholder="Valor planejado">

</div>
      
<div class="form-group">

    <input class = "form-control"  type = "text" id = "valorexecutado" name="valorexecutado" value = "<?=$meta->getValorexecutado()?>" placeholder="Valor executado">

</div>
       
<div class="form-group">

    <input type="text"  id="mesAno" name="mesAno" placeholder="Mes/ano" class="form-control" data-mask="99/9999" value="<?=$meta->getMes()?>/<?=$meta->getAno()?>">

</div>
 
<button class = "btn btn-primary" type = "submit">Salvar</button>
<button class = "btn btn-primary" type = "submit">Voltar</button>
<i class="fa fa-arrow-circle-left "></i> Voltar
        
 







    
      
      
      
      
 
      
      
      
      
      
 

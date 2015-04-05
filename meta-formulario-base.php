<div class="panel panel-primary painel">
  
    <div class="panel-heading">Cadastro de Metas</div>
    <div class="panel-body">
         <div class="form-group">
             
            <label for="valorplanejado">Planejado</label>
            <input class = "form-control" type = "text" id = "valorplanejado" name="valorplanejado"  value = "<?=$meta['valorplanejado']?>" placeholder="Valor planejado">
         </div>
      
         <div class="form-group">
            <label for="valorexecutado">Executado</label>
             <input class = "form-control"  type = "text" id = "valorexecutado" name="valorexecutado" value = "<?=$meta['valorexecutado']?>" placeholder="Valor executado">
        </div>
      
       <div class="form-group">
            <label for="valorexecutado">Mês</label>
             <input class = "form-control"  type = "text" id = "mes" name="mes" value = "<?=$meta['mes']?>" placeholder="Mês">
        </div>
        
        <div class="form-group">
            <label for="indicador_id">Indicador</label>
            
               <select name = "indicador_id" class = "form-control">	
                   <?php 
                        foreach($indicadores as $indicador):
                          $esseEhOIndicador = $meta['indicador_id']==$indicador['id'];
                          $selecao = $esseEhOIndicador ? "selected='selected'" : "";
                   ?>
                   <option value  = "<?=$indicador['id']?>" <?=$selecao?>>
		              <?=$indicador['nome']?>
		           </option>	
	               <?php endforeach ?>
	           </select>
            
        </div>
      
       <div class="form-group">
            <label for="usuario_id">Vendendor</label>
               <select name = "usuario_id" class = "form-control">	
               
		       <?php 
                    foreach($usuarios as $usuario):
			          $esseEhOVendedor = $meta['usuario_id']==$usuario['id'];
			          $selecao = $esseEhOVendedor ? "selected='selected'" : "";
	           ?>
               <option value  = "<?=$usuario['id']?>" <?=$selecao?>>
		          <?=$usuario['nome']?>
		       </option>	
	           <?php endforeach ?>
	           </select>
        </div>
      
       <button class = "btn btn-primary" type = "submit">Salvar</button>
        
  </div>

</div>

    
      
      
      
      
 
      
      
      
      
      
 

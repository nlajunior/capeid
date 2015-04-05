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
            <label for="mes">Mês</label>
            <Select class = "form-control" id ="mes" name = "mes" >
                                     
                <option value="1" <?php if($meta['mes']=="2"){?>selected='selected' <?php } ?>>JAN</option>
                <option value="2" <?php if($meta['mes']=="2"){?>selected='selected' <?php } ?>>FEV</option>
                <option value="3" <?php if($meta['mes']=="3"){?>selected='selected' <?php } ?>>MAR</option>
                <option value="4" <?php if($meta['mes']=="4"){?>selected='selected' <?php } ?>>ABR</option>
                <option value="5" <?php if($meta['mes']=="5"){?>selected='selected' <?php } ?>>MAI</option>
                <option value="6" <?php if($meta['mes']=="6"){?>selected='selected' <?php } ?>>JUN</option>
                
                <option value="7" <?php if($meta['mes']=="7"){?>selected='selected' <?php } ?>>JUL</option>
                <option value="8" <?php if($meta['mes']=="8"){?>selected='selected' <?php } ?>>AGO</option>
                <option value="9" <?php if($meta['mes']=="9"){?>selected='selected' <?php } ?>>SET</option>
                <option value="10" <?php if($meta['mes']=="10"){?>selected='selected' <?php } ?>>OUT</option>
                <option value="11" <?php if($meta['mes']=="11"){?>selected='selected' <?php } ?>>NOV</option>
                <option value="12" <?php if($meta['mes']=="12"){?>selected='selected' <?php } ?>>DEZ</option>
                
          </Select>
             
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

    
      
      
      
      
 
      
      
      
      
      
 

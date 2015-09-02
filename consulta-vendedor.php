<?php require_once("cabecalho.php");?>
<?php require_once("conecta.php");?>

<?php require_once("class/Usuario.php");?>
<?php require_once("class/UsuarioDAO.php");?>

<div class="container">
 
<form class="navbar-form centralizar" role="search" method="GET">
   
     <div class="form-group">
               
              <select name = "usuario_id" class = "form-control">	
                <option>Escolha o vendedor</option>
		          <?php 
                        $dao =  new UsuarioDAO($conexao);

                        $listaDeVendedores = $dao->listaUsuarios();

                        foreach($listaDeVendedores as $vendedor):
			         
	               ?>
                <option value  = "<?=$vendedor->getId()?>">
		              <?=$vendedor->getNome()?>
		        </option>	
	                   <?php endforeach ?>
	           </select>
                
            </div>
    <div class="form-group">
      
      <select name = "mes" class = "form-control">
                <option>Escolha o mês</option>    
                <option value  = "1">JAN</option>	
	            <option value  = "2">FEV</option>
                <option value  = "3">MAR</option>
                <option value  = "4">ABR</option>
                <option value  = "5">MAI</option>  
                <option value  = "6">JUN</option>
                <option value  = "7">JUL</option>
                <option value  = "8">AGO</option> 
                <option value  = "9">SET</option>
                <option value  = "10">OUT</option>
                <option value  = "11">NOV</option>
                <option value  = "12">DEZ</option>     
	   </select>
        
          
    
  </div>
    
       <div class="form-group">
      
      <select name = "ano" class = "form-control">
                <option>Escolha o ano</option>    
                <option>2015</option>	
	            <option>2016</option>
                <option>2017</option>
                   
	   </select>
        
          
    
  </div>
    
    
  <button type="submit" class="btn btn-primary glyphicon glyphicon-search"> Buscar</button>
</form>

 
                
</div>

<?php include_once("meta-lista.php");?>



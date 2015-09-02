<?php
 /*Revisado 18/08/2015*/

function carregaClasse($nomeDaClasse){
    require_once("class/".$nomeDaClasse.".php");
  }
  spl_autoload_register("carregaClasse");

  error_reporting(E_ALL ^ E_NOTICE);
  require_once("mostra-alerta.php"); 
  require_once("logica-usuario.php"); 
 
?>

<html>
  <head>
      
	
	<title>Treinid</title>
    <link rel="icon" href = "images/logo02.png"/>   
	<link rel="stylesheet" href="css/bootstrap-flatly.css">
    <link href="css/estilo.css" rel="stylesheet">
	<meta charset="utf-8"  name="viewport" content="width=device-width, initial-scale=1">
       
  </head>
    
  <body>
  	<header>
    
        <nav class="navbar navbar-default navbar-fixed-top">
  		<div class="container-fluid">
    			<div class="navbar-header">
        			<a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-home"></span></a>
					<button class="navbar-toggle" type="button" data-target=".navbar-collapse" data-toggle="collapse">
        					<span class="glyphicon glyphicon-align-justify"></span>
       					</button>
    			</div>
    
			<div>
      				<ul class="nav navbar-nav collapse navbar-collapse">
        				<li class="active"><a href="http://www.cigel.com.br">Home</a></li>
        				<li class="dropdown">
          				<a class="dropdown-toggle" data-toggle="dropdown" href="#">Meta<span class="caret"></span></a>
          					<ul class="dropdown-menu">
            						<li><a href="consulta-vendedor.php">Listar</a></li>
            						<li><a href="meta-formulario.php">Incluir</a></li>
            				</ul>
        				</li>
					<li class="dropdown">
          				<a class="dropdown-toggle" data-toggle="dropdown" href="#">Indicador<span class="caret"></span></a>
          					<ul class="dropdown-menu">
            						<li><a href="consulta-vendedor.php">Listar</a></li>
            						<li><a href="consulta-vendedor.php">Incluir</a></li>
            					</ul>
        				</li>
					<li class="dropdown">
          				<a class="dropdown-toggle" data-toggle="dropdown" href="#">Treinamento<span class="caret"></span></a>
          					<ul class="dropdown-menu">
            						<li><a href="consulta-vendedor.php">Listar</a></li>
            						<li><a href="consulta-vendedor.php">Incluir</a></li>
            					</ul>
        				</li>
        				
                        
					<?php if (usuarioEstaLogado()){?>
					   <li><a href="logout.php">Sair</a></li>  
        				<?php } ?>
      
      				</ul>
                    
            
                        
    			

  		</div>
		</nav>
	</header>
  	
	<div class="container">
		<div class="principal">
            
            <div class="container centralizar">
		      <?php mostraAlerta("success"); ?>
		      <?php mostraAlerta("danger"); ?>
         </div>
         
	  
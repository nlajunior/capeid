<?php 
error_reporting(E_ALL ^ E_NOTICE);  
require_once("mostra-alerta.php");?>
<?php require_once("logica-usuario.php");?>
<html>
     <head>
       <title>CAPEID</title>
       <link rel="icon" href = "images/logo02.png"/>
       <link rel="stylesheet" href="css/reset.css"/>
       <link rel="stylesheet" href="css/menu.css"/>     
       <link rel="stylesheet" href="css/estilo.css"/>
       <link href="css/bootstrap.css" rel="stylesheet"/>
       <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    </head> 

     <body>
        <header class="cabecalho"> 
            <nav>
                 <ul class="menu">
                        
                        
                            <li><a href="#">Cadastros</a>
                                <ul>
                                      <li><a href="livro-lista.php">Livros</a></li>
                                      <li><a href="video-lista.php">Vídeos</a></li>
                                      <li><a href="#">Treinamentos</a></li>                    
                                </ul>
                            </li>
                        <li><a href="meta-lista.php">Metas</a></li>
                        <li><a href="meta-lista.php">Plano</a></li>
                        <li><a href="logout.php">Logout</a></li>                
                </ul>
                </nav>
            
           
           <div class="container-fluid alerta">
                <?php 
                    mostraAlerta("success");
                    mostraAlerta("danger");    
                ?>   
            </div>
         </header>        
         
	   <div class = "container">
           
          
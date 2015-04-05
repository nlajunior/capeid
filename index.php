<!DOCTYPE html>

<?php require_once("logica-usuario.php");?>
<?php error_reporting(E_ALL ^ E_NOTICE); ?> 
<?php require_once("mostra-alerta.php");?>

<html>
    <head>
       <title>CAPEID</title>
       <link rel="icon" href = "images/logo03-2.png"/>
       <link rel="stylesheet" href="css/reset.css"/>
       <link rel="stylesheet" href="css/estilo.css"/>
       <link href="css/bootstrap.css" rel="stylesheet" />
       <meta charset="utf-8"  name="viewport" content="width=device-width, initial-scale=1">
   </head>  
    
    <body>
       <header class="cabecalho">
            <div class="container">
                <img  src ="images/logo03-2.png" alt="Logomarca do sistema">
            </div> 
            <div class="container alerta">
                 <?php 
                    mostraAlerta("success");
                    mostraAlerta("danger");  
                 ?>   
            </div>
        </header>
        <main>
            <div class="container"> 
                  <div class="principal">

                    <form class="form-inline" action = "login.php" method = "post">
                          <div class="form-group">
                                <label class="sr-only" for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="* E-mail">
                          </div>

                          <div class="form-group">
                                <label class="sr-only" for="senha">Senha</label>
                                <input type="password" class="form-control" id="senha" name="senha" placeholder="* Senha">
                          </div>

                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> Esqueceu a senha
                            </label>
                          </div>
                          <button type="submit" class="btn btn-primary">Acessar</button>
                    </form>
                </div>
            </div>
        </main>
        <footer class="rodape">Copyright &copy; 2015</footer>    
    </body>
    
</html>

    
   
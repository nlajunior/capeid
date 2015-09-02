
<?php require_once("logica-usuario.php");
      require_once("class/UsuarioDAO.php");
      require_once("conecta.php");?>


<?php
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    
    $dao = new UsuarioDAO($conexao);
    
    $usuarioSelecionado = $dao->buscaUsuario($email, $senha);

    if ($usuarioSelecionado==null){
      $_SESSION["danger"] = "Usuário ou senha inválido!";    
      header("Location: index.php");
    }else{
       $_SESSION["success"] = "Usuário ".$usuarioSelecionado->getEmail(). " logado com sucesso!";    
       logaUsuario($usuarioSelecionado->getEmail());
       header("Location: acesso.php");
       }

    die();
                
                
                
                


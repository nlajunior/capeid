<?php

require_once("class/Usuario.php"); 

class UsuarioDAO{
    
private $conexao;
    
    function __construct($conexao) {
        $this->conexao = $conexao;
    }

function buscaUsuario($email, $senha){
    
    $senhaMdCinco = md5($senha);
    $email = mysqli_escape_string($this->conexao, $email);
    
    $query = "SELECT * FROM usuario WHERE email = '{$email}' AND senha = '{$senhaMdCinco}'";
    $resultado = mysqli_query($this->conexao, $query);
    
    while ($usuarioAtual = mysqli_fetch_assoc($resultado)){
        $usuarioSelecionado = new Usuario();
        
        $usuarioSelecionado->setEmail($usuarioAtual['email']);
        $usuarioSelecionado->setSenha($usuarioAtual['senha']);
    }
   
    return $usuarioSelecionado;
}

	public function listaUsuarios (){

		$listaDeUsuarios = array();
        $query = "SELECT id, nome FROM usuario WHERE ativo=1 ORDER BY nome";
		$resultado = mysqli_query($this->conexao, $query);

	    while($usuarioAtual = mysqli_fetch_assoc($resultado)){
            
	        $usuarioSelecionado = new Usuario();
            
            $usuarioSelecionado->setId($usuarioAtual['id']);
            $usuarioSelecionado->setNome($usuarioAtual['nome']);
            $usuarioSelecionado->setEmail($usuarioAtual['email']);
            $usuarioSelecionado->setSenha($usuarioAtual['senha']);
            
            array_push($listaDeUsuarios, $usuarioSelecionado);
	    }
		
        return $listaDeUsuarios;
	}

}

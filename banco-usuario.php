<?php
require_once("conecta.php");

function buscaUsuario($conexao, $email, $senha){
    $senhaMdCinco = md5($senha);
    $email = mysqli_escape_string($conexao, $email);
    
    $query = "SELECT * FROM usuario WHERE email = '{$email}' AND senha = '{$senhaMdCinco}'";
    $resultado = mysqli_query($conexao, $query);
    
    $usuario = mysqli_fetch_assoc($resultado);
    return $usuario;
}

	function listaUsuarios ($conexao){

		$usuarios = array();
        $query = "SELECT id, nome FROM usuario WHERE ativo=1 ORDER BY nome";
		$resultado = mysqli_query($conexao, $query);

	    while($usuario = mysqli_fetch_assoc($resultado)){
	       array_push($usuarios, $usuario);
	    }
		return $usuarios;
	}



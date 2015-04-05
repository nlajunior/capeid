<?php
   require_once("conecta.php");
   function listaIndicadores($conexao){
	$indicadores = array();
	$query = "select * from indicador WHERE ativo=1 ORDER BY nome";
	$resultado = mysqli_query($conexao, $query);

	while ($indicador = mysqli_fetch_assoc($resultado)){
	   array_push($indicadores, $indicador);
        }
	return $indicadores;
   }



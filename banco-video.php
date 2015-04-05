<?php
    require_once("conecta.php");

   	function insereVideo($conexao, $titulo, $autor, $duracao, $midia, $detalhes, $categoria_id){
	   $query = "INSERT INTO video(titulo, autor, duracao, midia, detalhes, categoria_id) 
                       values('{$titulo}','{$autor}',{$duracao},'{$midia}','{$detalhes}',{$categoria_id})";
	   echo $query;
	   return mysqli_query($conexao, $query);

	}
	
	function alteraVideo($conexao, $id, $titulo, $autor, $duracao, $midia, $detalhes){
	   $query = "UPDATE video SET 
                     titulo = '{$titulo}',
                     autor = '{$autor}',
                     duracao = {$duracao},
                     midia='{$midia}',
                     detalhes='{$detalhes}'
                 WHERE id = {$id}";
	   return mysqli_query($conexao, $query);
	}	   	

	function listaVideos ($conexao){

		$videos = array();
		$resultado = mysqli_query($conexao, "select v.*,c.nome as categoria_nome from video as v join categoria as c on v.categoria_id=c.id");

	    while($video = mysqli_fetch_assoc($resultado)){
	       array_push($videos, $video);
	    }
		return $videos;
	}

	function buscaVideo($conexao, $id){

	  $query = "SELECT * FROM video WHERE id={$id}";
	  $resultado = mysqli_query($conexao, $query);

	  return mysqli_fetch_assoc($resultado);
	}

	function removeVideo($conexao, $id){
		$query = "delete from video where id = {$id}";
		return mysqli_query($conexao, $query);
	}

?>

<?php
    require_once("conecta.php");

   	function insereLivro($conexao, $titulo, $autor, $edicao, $editora){
	   $query = "INSERT INTO livro(titulo, autor, edicao, editora) 
                       values('{$titulo}','{$autor}',{$edicao},'{$editora}')";
	   echo $query;
	   return mysqli_query($conexao, $query);

	}
	
	function alteraLivro($conexao, $id,  $titulo, $autor, $edicao, $editora){
	   $query = "UPDATE livro SET 
                     titulo = '{$titulo}',
                     autor = '{$autor}',
                     edicao = {$edicao},
                     editora='{$editora}'
                                       
                 WHERE id = {$id}";
	   return mysqli_query($conexao, $query);
	}	   	

	function listaLivros ($conexao){

		$livros = array();
		$resultado = mysqli_query($conexao, "select l.*,c.nome as categoria_nome from livro as l join categoria as c on l.categoria_id=c.id");

	    while($livro = mysqli_fetch_assoc($resultado)){
	       array_push($livros, $livro);
	    }
		return $livros;
	}

	function buscaLivro($conexao, $id){

	  $query = "SELECT * FROM livro WHERE id={$id}";
	  $resultado = mysqli_query($conexao, $query);

	  return mysqli_fetch_assoc($resultado);
	}

	function removeLivro($conexao, $id){
		$query = "delete from livro where id = {$id}";
		return mysqli_query($conexao, $query);
	}

?>

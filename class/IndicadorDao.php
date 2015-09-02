<?php

require_once("autoload.php"); 

class IndicadorDao{
    
private $conexao;
    
    function __construct($conexao) {
        $this->conexao = $conexao;
    }

function buscaIndicador($id){
    
    $query = "SELECT * FROM indicador WHERE id = '{$id}''";
    $resultado = mysqli_query($this->conexao, $query);
    
    while ($indicadorAtual = mysqli_fetch_assoc($resultado)){
        $indicadorSelecionado = new Indicador();
        
        $indicadorSelecionado->setId($indicadorAtual['id']);
        $indicadorSelecionado->setNome($indicadorAtual['nome']);
    }
   
    return $indicadorSelecionado;
}

	public function listaIndicadores (){

		$listaDeIndicadores = array();
        
        $query = "SELECT id, nome FROM indicador WHERE ativo=1 ORDER BY nome";
		$resultado = mysqli_query($this->conexao, $query);

	    while($indicadorAtual = mysqli_fetch_assoc($resultado)){
            
	        $indicadorSelecionado = new Usuario();
            
            $indicadorSelecionado->setId($indicadorAtual['id']);
            $indicadorSelecionado->setNome($indicadorAtual['nome']);
        
            
            array_push($listaDeIndicadores, $indicadorSelecionado);
	    }
		
        return $listaDeIndicadores;
	}

}

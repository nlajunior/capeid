<?php

class TreinamentoDao{

    private $conexao;
    
    function __construct($conexao) {
        $this->conexao = $conexao;
    }
    
      public function insereTeinamento(Treinamento $treinamento){
	   $query = "INSERT INTO treinamento (nome, ch, autor, editora, isbn) 
                       VALUES ({$treinamento->getNome()},
                       {$treinamento->getCh()},
                       
                       {$meta->getMes()},
                       {$meta->getAno()},
                       {$meta->getIndicador()->getId()},
                       {$meta->getVendedor()->getId()})";
        
	   echo $query;
	   return mysqli_query($this->conexao, $query);

	}
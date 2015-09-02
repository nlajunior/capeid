<?php

class Treinamento{
    
    private $id;
    private $nome;
    private $ch;
    
    public function getId(){
        
        return $this->id;
        
    }
    
    public function getNome(){
        
        return $this->nome;
        
    }
    
    public function getCh(){
        
        return $this->ch;
        
    }
    
    
    public function setId($id){
        
        $this->id = $id;
        
    }
    
    public function setNome($nome){
        
        $this->nome = $nome;
        
    }
    
    public function setCh($ch){
        
        $this->ch =  $ch;
        
    }
    
     function temIsbn() {
        return $this instanceof Livro;
    }
    
    
}
    
?>
        
<?php

class Livro extends Treinamento{

    private $isbn;
    private $autor;
    private $editora;
    
    public function getISBN(){
        
        return $this->isbn;
        
    }
    
    public function getAutor(){
        
        return $this->autor;
        
        
    }
    
    public function getEditora(){
        
        return $this->editora;
        
    }
    
    public function setISBN($isbn){
        
        $this->isbn = $isbn;
        
    }
    
    public function setAutor($autor){
        
        $this->autor = $autor;
        
    }
    
       public function setEditor($editora){
        
        $this->editora = $editora;
        
    }
    
}
?>
    
<?php
class Meta{
    private $id;
    private $valorPlanejado;
    private $valorExecutado;
    private $mes;
    private $ano;
    private $indicador;
    private $vendedor;
    private $ativo;
    
    public function traduzMes(){
        
       if ($this->mes==1){ return 'JAN';}    
       if ($this->mes==2){ return 'FEV';}
       if ($this->mes==3){ return 'MAR';}
       if ($this->mes==4){ return 'ABR';}
       if ($this->mes==5){ return 'MAI';} 
       if ($this->mes==6){ return 'JUN';}  
       if ($this->mes==7){ return 'JUL';}  
       if ($this->mes==8){ return 'AGO';}
       if ($this->mes==9){ return 'SET';}
       if ($this->mes==10){ return 'OUT';} 
       if ($this->mes==11){ return 'NOV';} 
       if ($this->mes==12){ return 'DEZ';}    
    }
    
    public function calculaMeta(){
       $resultado = ($this->valorExecutado*100)/$this->valorPlanejado;  
       return number_format($resultado,0,",","") .'%';                     
    }
    
    public function getId(){
         return $this->id;
     }
    
         
     public function getValorPlanejado(){
        return $this->valorPlanejado;
    }
    
      public function getValorExecutado(){
          return $this->valorExecutado;
      }
    
     public function getMes(){
         
         return $this->mes;
    }
    
      public function getAno(){
          return $this->ano;
      }
    
     public function getIndicador(){
        return $this->indicador;
    }
    
      public function getVendedor(){
          return $this->vendedor;
      }
    
      public function setId($id){
          $this->id = $id;
      }
    
     public function setValorPlanejado($valorPlanejado){
          $this->valorPlanejado = $valorPlanejado;
      }
    
    public function setValorExecutado($valorExecutado){
        $this->valorExecutado = $valorExecutado;
    }
    
     public function setMes($mesAno){
         
        $me = explode("/",$mesAno); 
        $this->mes ="$me[0]";
    }
    
     public function setAno($mesAno){
        
        $an = explode("/",$mesAno); 
        $this->ano ="$an[1]"; 
        
    }
    
     public function setIndicador($indicador){
        $this->indicador = $indicador;
    }
    
       public function setVendedor($vendedor){
        $this->vendedor = $vendedor;
    }
  
    

 }
?>
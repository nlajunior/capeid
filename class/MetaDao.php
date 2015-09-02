<?php
    require_once("autoload.php");
    

    class MetaDao{
        
     private $conexao;
    
    function __construct($conexao) {
        $this->conexao = $conexao;
    }
        
    public function insereMeta(Meta $meta){
	   $query = "INSERT INTO meta (valorplanejado, valorexecutado, mes, ano, indicador_id, usuario_id) 
                       VALUES ({$meta->getValorPlanejado()},
                       {$meta->getValorExecutado()},
                       {$meta->getMes()},
                       {$meta->getAno()},
                       {$meta->getIndicador()->getId()},
                       {$meta->getVendedor()->getId()})";
        
	   echo $query;
	   return mysqli_query($this->conexao, $query);

	}

    public function alteraMeta($meta){
	   $query = "UPDATE meta SET valorplanejado = {$meta->getValorPlanejado()}, valorexecutado = {$meta->getValorExecutado()}, mes = {$meta->getMes()}, ano = {$meta->getAno()}, indicador_id   = {$meta->getIndicador()->getId()}, usuario_id= {$meta->getVendedor()->getId()} where id = '{$meta->getId()}'";
        
	   return mysqli_query($this->conexao, $query);
	}	   	

	public function listaMetas($id,$mes){
       $listaDeMetas = array();
       $query ="SELECT m.id, u.nome AS usuario_nome, i.nome AS indicador_nome, m.valorplanejado AS planejado, m.valorexecutado AS executado, m.valorexecutado*100/m.valorplanejado AS resultado, m.mes, m.ano, m.usuario_id, m.indicador_id FROM meta m INNER JOIN indicador i ON m.indicador_id=i.id INNER JOIN usuario u ON m.usuario_id=u.id WHERE m.ativo= 1 AND m.usuario_id={$id} AND m.mes={$mes} AND m.ano=(SELECT EXTRACT(YEAR FROM CURDATE()))";
        
        
		$resultado = mysqli_query($this->conexao, $query);

	    while ($metaAtual = mysqli_fetch_assoc($resultado)){
           
           $metaSelecionada = new Meta();
           $vendedor = new Usuario();
           $indicador =  new Indicador();    
            
           $metaSelecionada->setId($metaAtual['id']);
           $metaSelecionada->setValorPlanejado($metaAtual['planejado']); 
           $metaSelecionada->setValorExecutado($metaAtual['executado']); 
           $metaSelecionada->setMes($metaAtual['mes']);    
           $metaSelecionada->setAno($metaAtual['ano']);
            
           $vendedor->setId($metaAtual['usuario_id']);    
           $vendedor->setNome($metaAtual['usuario_nome']);
           
           $metaSelecionada->setVendedor($vendedor);  
            
           $indicador->setId($metaAtual['indicador_id']);
           $indicador->setNome($metaAtual['indicador_nome']);    
            
           $metaSelecionada->setIndicador($indicador);     
               
	       array_push($listaDeMetas, $metaSelecionada);
	    }
		return $listaDeMetas;
	}



	public function buscaMeta($id){

	  
            $query ="SELECT m.id, u.nome AS usuario_nome, i.nome AS indicador_nome, m.valorplanejado AS planejado, m.valorexecutado AS executado, m.valorexecutado*100/m.valorplanejado AS resultado, m.mes, m.ano, m.usuario_id, m.indicador_id FROM meta m INNER JOIN indicador i ON m.indicador_id=i.id INNER JOIN usuario u ON m.usuario_id=u.id WHERE m.ativo= 1 AND m.id={$id}";
        
       
	  
     $resultado = mysqli_query($this->conexao, $query);

    while ($metaAtual = mysqli_fetch_assoc($resultado)){  
        
      $metaSelecionada = new Meta();
      $vendedor = new Usuario();
      $indicador =  new Indicador();    
            
      $metaSelecionada->setId($metaAtual['id']);
      $metaSelecionada->setValorPlanejado($metaAtual['planejado']); 
      $metaSelecionada->setValorExecutado($metaAtual['executado']); 
      $mesAno = $metaAtual['mes']."/".$metaAtual['ano'];     
      $metaSelecionada->setMes($mesAno);    
      $metaSelecionada->setAno($mesAno);
            
      $vendedor->setId($metaAtual['usuario_id']);    
      $vendedor->setNome($metaAtual['usuario_nome']);
           
      $metaSelecionada->setVendedor($vendedor);  
            
      $indicador->setId($metaAtual['indicador_id']);
      $indicador->setNome($metaAtual['indicador_nome']);    
            
      $metaSelecionada->setIndicador($indicador); 
           
        }

	  return $metaSelecionada;
	}
}

?>

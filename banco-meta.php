<?php
    require_once("conecta.php");

   	function insereMeta($conexao, $valorplanejado, $valorexecutado, $mes, $indicador_id, $usuario_id){
	   $query = "INSERT INTO meta(valorplanejado, valorexecutado, mes, indicador_id, usuario_id) 
                       VALUES({$valorplanejado},{$valorexecutado},{$mes},{$indicador_id},{$usuario_id})";
	   echo $query;
	   return mysqli_query($conexao, $query);

	}

    function alteraMeta($conexao, $id,  $valorplanejado, $valorexecutado, $mes, $indicador_id, $usuario_id){
	   $query = "UPDATE meta SET 
                     valorplanejado = {$valorplanejado},
                     valorexecutado = {$valorexecutado},
                     mes            = {$mes},
                     indicador_id   = {$indicador_id},
                     usuario_id     = {$usuario_id}
                 WHERE id = {$id}";
	   return mysqli_query($conexao, $query);
	}	   	

	function listaMetas($conexao, $id){
        $query ="SELECT m.id,  u.nome AS usuario_nome,
                   i.nome AS indicador_nome,
                   m.valorplanejado AS planejado,
                   m.valorexecutado AS executado,
                   m.valorexecutado*100/m.valorplanejado AS resultado, 
                   m.mes, m.atingiu,
                   m.usuario_id,
                   m.indicador_id
              FROM meta m
              INNER JOIN indicador i
              ON m.indicador_id=i.id
              INNER JOIN usuario u
              ON m.usuario_id=u.id
              WHERE m.ativo= 1 AND m.usuario_id={$id}";
        $metas = array();
		$resultado = mysqli_query($conexao, $query);

	    while($meta = mysqli_fetch_assoc($resultado)){
	       array_push($metas, $meta);
	    }
		return $metas;
	}



	function buscaMeta($conexao, $id){

	  $query = "SELECT 
                   u.nome AS usuario_nome,
                   i.nome,
                   m.id,
                   m.valorplanejado,
                   m.valorexecutado,
                   m.mes, m.atingiu,
                   m.usuario_id,
                   m.indicador_id
              FROM meta m
              INNER JOIN indicador i
              ON m.indicador_id=i.id
              INNER JOIN usuario u
              ON m.usuario_id=u.id
              WHERE m.ativo= 1 AND m.id={$id}";
	  $resultado = mysqli_query($conexao, $query);

	  return mysqli_fetch_assoc($resultado);
	}

	

?>

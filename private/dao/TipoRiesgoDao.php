<?PHP

if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT']."/horizon";
require_once($rootDir . "/private/BD/bd.php");
require_once($rootDir . "/private/entities/TipoRiesgo.php");
class TipoRiesgoDao {
   public static function sqlInsert( $tp)
   {
        $stSql  = "insert into tipo_riesgo (";
        $stSql .= " tp_id, tp_name, tp_status";
        $stSql .= " )values (";
        $stSql .= " '{$tp->getId()}'"
                . ",'{$tp->getName()}'"
                . ",'{$tp->getStatus()}'"
                . ")";
		return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function sqladdId(){
        $bd=new BD();
        $misRegistros= $bd->sqlSelectTodo("SELECT MAX(tp_id) FROM `tipo_riesgo`");
        foreach($misRegistros as $fila) 
        {$var=$fila['MAX(tp_id)'];}
        //le sumo 1
        $var=$var+1;
        return $var;
    }
   public static function sqlContar($param)
   {
        $stSql = "select * from tipo_riesgo WHERE (tp_id = {$param} OR tp_name LIKE '%{$param}%')";
        return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function sqlExiste($param)
   {
        $stSql = "select * from tipo_riesgo WHERE tp_name = '{$param}'";
        return BD::getInstance()->sqlEjecutar($stSql);
   }
    public static function sqlBuscar($param)
   {
        $stSql = "select * from tipo_riesgo WHERE tp_name LIKE '%{$param}%'";
        return BD::getInstance()->sqlSelectTodo($stSql);
   }
   public static function sqlUpdate( $tp)
   {
        $stSql =  "update tipo_riesgo SET ";
        $stSql .= " tp_name='{$tp->getName()}'"
                . ",tp_status='{$tp->getStatus()}'"
                       ;
        $stSql .= " Where  tp_id='{$tp->getId()}'"
                       ;
        return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function sqlCargar( $id)
   {
        $stSql =  "select *  from  tipo_riesgo ";
        $stSql .= " Where  tp_id ={$id}"
                          ;
        $resultado= BD::getInstance()->sqlSelect($stSql);
  $fila= BD::getInstance()->sqlFetch();
  if (!$fila) return null;
  $tpAux = new TipoRiesgo($fila["tp_id"]
          ,$fila["tp_name"]
          ,$fila["tp_status"]);
        return $tpAux;
   }
   // MÃ©todo que ejecuta una sentencia,
   // Sin embargo no retorna ningÃºn registro
   public static function sqlSelect( $tp)
   {
        $stSql =  "select *  from  tipo_riesgo ";
        $stSql .= " Where  tp_id ={$tp->getId()}"
                          ;
        $resultado= BD::getInstance()->sqlSelect($stSql);
	if(!$resultado) return false;
	return true;
   }
    
   public static function sqlFetch()
   {
  $fila= BD::getInstance()->sqlFetch();
  if (!$fila) return null;
  $tpAux = new TipoRiesgo($fila["tp_id"]
          ,$fila["tp_name"]
          ,$fila["tp_status"]);
        return $tpAux;
   }
   public static function sqlFetchtp($tp)
   {
	$fila= BD::getInstance()->sqlFetch();
        if (!$fila) return false;
        $tp->setId($fila["tp_id"]);
        $tp->setName($fila["tp_name"]);
        $tp->setStatus($fila["tp_status"]);
        return true;						  
   }

   public static function sqlTodo()
   {   
       $misRegistros= BD::getInstance()->sqlSelectTodo("SELECT * FROM `tipo_riesgo`");
       return $misRegistros;
   }

}
?>
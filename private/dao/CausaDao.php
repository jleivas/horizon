<?PHP

if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT']."/horizon";
require_once($rootDir . "/private/BD/bd.php");
require_once($rootDir . "/private/entities/Causa.php");
class CausaDao {
   public static function sqlInsert( $ca)
   {
        $stSql  = "insert into causa (";
        $stSql .= " ca_id, ca_name, ca_status";
        $stSql .= " )values (";
        $stSql .= " '{$ca->getId()}'"
                . ",'{$ca->getName()}'"
                . ",'{$ca->getStatus()}'"
                . ")";
		return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function sqladdId(){
        $bd=new BD();
        $misRegistros= $bd->sqlSelectTodo("SELECT MAX(ca_id) FROM `causa`");
        foreach($misRegistros as $fila) 
        {$var=$fila['MAX(ca_id)'];}
        //le sumo 1
        $var=$var+1;
        return $var;
    }
   public static function sqlContar($param)
   {
        $stSql = "select * from causa WHERE (ca_id = {$param} OR ca_name LIKE '%{$param}%')";
        return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function sqlExiste($param)
   {
        $stSql = "select * from causa WHERE ca_name = '{$param}'";
        return BD::getInstance()->sqlEjecutar($stSql);
   }
    public static function sqlBuscar($param)
   {
        $stSql = "select * from causa WHERE ca_name LIKE '%{$param}%'";
        return BD::getInstance()->sqlSelectTodo($stSql);
   }
   public static function sqlUpdate( $ca)
   {
        $stSql =  "update causa SET ";
        $stSql .= " ca_name='{$ca->getName()}'"
                . ",ca_status='{$ca->getStatus()}'"
                       ;
        $stSql .= " Where  ca_id='{$ca->getId()}'"
                       ;
        return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function sqlCargar( $id)
   {
        $stSql =  "select *  from  causa ";
        $stSql .= " Where  ca_id ={$id}"
                          ;
        $resultado= BD::getInstance()->sqlSelect($stSql);
  $fila= BD::getInstance()->sqlFetch();
  if (!$fila) return null;
  $caAux = new Causa($fila["ca_id"]
          ,$fila["ca_name"]
          ,$fila["ca_status"]);
        return $caAux;
   }
   // MÃ©todo que ejecuta una sentencia,
   // Sin embargo no retorna ningÃºn registro
   public static function sqlSelect( $ca)
   {
        $stSql =  "select *  from  causa ";
        $stSql .= " Where  ca_id ={$ca->getId()}"
                          ;
        $resultado= BD::getInstance()->sqlSelect($stSql);
	if(!$resultado) return false;
	return true;
   }
    
   public static function sqlFetch()
   {
  $fila= BD::getInstance()->sqlFetch();
  if (!$fila) return null;
  $caAux = new Causa($fila["ca_id"]
          ,$fila["ca_name"]
          ,$fila["ca_status"]);
        return $caAux;
   }
   public static function sqlFetchca($ca)
   {
	$fila= BD::getInstance()->sqlFetch();
        if (!$fila) return false;
        $ca->setId($fila["ca_id"]);
        $ca->setName($fila["ca_name"]);
        $ca->setStatus($fila["ca_status"]);
        return true;						  
   }

   public static function sqlTodo()
   {   
       $misRegistros= BD::getInstance()->sqlSelectTodo("SELECT * FROM `causa`");
       return $misRegistros;
   }

   public static function sqlListar()
   {   
       $misRegistros= BD::getInstance()->sqlSelectTodo("SELECT * FROM `causa` WHERE ca_status = 1");
       return $misRegistros;
   }

}
?>
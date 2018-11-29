<?PHP

if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT']."/horizon";
require_once($rootDir . "/private/BD/bd.php");
require_once($rootDir . "/private/entities/Accion.php");
class AccionDao {
   public static function sqlInsert( $ac)
   {
        $stSql  = "insert into action (";
        $stSql .= " ac_id, ac_name, ac_status";
        $stSql .= " )values (";
        $stSql .= " '{$ac->getId()}'"
                . ",'{$ac->getName()}'"
                . ",'{$ac->getStatus()}'"
                . ")";
		return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function sqladdId(){
        $bd=new BD();
        $misRegistros= $bd->sqlSelectTodo("SELECT MAX(ac_id) FROM `action`");
        foreach($misRegistros as $fila) 
        {$var=$fila['MAX(ac_id)'];}
        //le sumo 1
        $var=$var+1;
        return $var;
    }
   public static function sqlContar($param)
   {
        $stSql = "select * from action WHERE (ac_id = {$param} OR ac_name LIKE '%{$param}%')";
        return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function sqlExiste($param)
   {
        $stSql = "select * from action WHERE ac_name = '{$param}'";
        return BD::getInstance()->sqlEjecutar($stSql);
   }
    public static function sqlBuscar($param)
   {
        $stSql = "select * from action WHERE ac_name LIKE '%{$param}%'";
        return BD::getInstance()->sqlSelectTodo($stSql);
   }
   public static function sqlUpdate( $ac)
   {
        $stSql =  "update action SET ";
        $stSql .= " ac_name='{$ac->getName()}'"
                . ",ac_status='{$ac->getStatus()}'"
                       ;
        $stSql .= " Where  ac_id='{$ac->getId()}'"
                       ;
        return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function sqlCargar( $id)
   {
        $stSql =  "select *  from  action ";
        $stSql .= " Where  ac_id ={$id}"
                          ;
        $resultado= BD::getInstance()->sqlSelect($stSql);
  $fila= BD::getInstance()->sqlFetch();
  if (!$fila) return null;
  $acAux = new Accion($fila["ac_id"]
          ,$fila["ac_name"]
          ,$fila["ac_status"]);
        return $acAux;
   }
   // MÃ©todo que ejecuta una sentencia,
   // Sin embargo no retorna ningÃºn registro
   public static function sqlSelect( $ac)
   {
        $stSql =  "select *  from  action ";
        $stSql .= " Where  ac_id ={$ac->getId()}"
                          ;
        $resultado= BD::getInstance()->sqlSelect($stSql);
	if(!$resultado) return false;
	return true;
   }
    
   public static function sqlFetch()
   {
  $fila= BD::getInstance()->sqlFetch();
  if (!$fila) return null;
  $acAux = new AccionDao($fila["ac_id"]
          ,$fila["ac_name"]
          ,$fila["ac_status"]);
        return $acAux;
   }
   public static function sqlFetchac($ac)
   {
	$fila= BD::getInstance()->sqlFetch();
        if (!$fila) return false;
        $ac->setId($fila["ac_id"]);
        $ac->setName($fila["ac_name"]);
        $ac->setStatus($fila["ac_status"]);
        return true;						  
   }

   public static function sqlTodo()
   {   
       $misRegistros= BD::getInstance()->sqlSelectTodo("SELECT * FROM `action`");
       return $misRegistros;
   }

   public static function sqlListar()
   {   
       $misRegistros= BD::getInstance()->sqlSelectTodo("SELECT * FROM `action` WHERE ac_status = 1");
       return $misRegistros;
   }

}
?>
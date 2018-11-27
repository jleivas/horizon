<?PHP

if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT']."/horizon";
require_once($rootDir . "/private/BD/bd.php");
require_once($rootDir . "/private/entities/TratamientoRiesgo.php");
class TratamientoRiesgoDao {
   public static function sqlInsert( $tr)
   {
        $stSql  = "insert into treatment (";
        $stSql .= " tr_id, tr_name, tr_status";
        $stSql .= " )values (";
        $stSql .= " '{$tr->getId()}'"
                . ",'{$tr->getName()}'"
                . ",'{$tr->getStatus()}'"
                . ")";
		return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function sqladdId(){
        $bd=new BD();
        $misRegistros= $bd->sqlSelectTodo("SELECT MAX(tr_id) FROM `treatment`");
        foreach($misRegistros as $fila) 
        {$var=$fila['MAX(tr_id)'];}
        //le sumo 1
        $var=$var+1;
        return $var;
    }
   public static function sqlContar($param)
   {
        $stSql = "select * from treatment WHERE (tr_id = {$param} OR tr_name LIKE '%{$param}%')";
        return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function sqlExiste($param)
   {
        $stSql = "select * from treatment WHERE tr_name = '{$param}'";
        return BD::getInstance()->sqlEjecutar($stSql);
   }
    public static function sqlBuscar($param)
   {
        $stSql = "select * from treatment WHERE tr_name LIKE '%{$param}%'";
        return BD::getInstance()->sqlSelectTodo($stSql);
   }
   public static function sqlUpdate( $tr)
   {
        $stSql =  "update treatment SET ";
        $stSql .= " tr_name='{$tr->getName()}'"
                . ",tr_status='{$tr->getStatus()}'"
                       ;
        $stSql .= " Where  tr_id='{$tr->getId()}'"
                       ;
        return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function sqlCargar( $id)
   {
        $stSql =  "select *  from  treatment ";
        $stSql .= " Where  tr_id ={$id}"
                          ;
        $resultado= BD::getInstance()->sqlSelect($stSql);
  $fila= BD::getInstance()->sqlFetch();
  if (!$fila) return null;
  $trAux = new TratamientoRiesgo($fila["tr_id"]
          ,$fila["tr_name"]
          ,$fila["tr_status"]);
        return $trAux;
   }
   // MÃ©todo que ejecuta una sentencia,
   // Sin embargo no retorna ningÃºn registro
   public static function sqlSelect( $tr)
   {
        $stSql =  "select *  from  treatment ";
        $stSql .= " Where  tr_id ={$tr->getId()}"
                          ;
        $resultado= BD::getInstance()->sqlSelect($stSql);
	if(!$resultado) return false;
	return true;
   }
    
   public static function sqlFetch()
   {
  $fila= BD::getInstance()->sqlFetch();
  if (!$fila) return null;
  $trAux = new TratamientoRiesgo($fila["tr_id"]
          ,$fila["tr_name"]
          ,$fila["tr_status"]);
        return $trAux;
   }
   public static function sqlFetchtr($tr)
   {
	$fila= BD::getInstance()->sqlFetch();
        if (!$fila) return false;
        $tr->setId($fila["tr_id"]);
        $tr->setName($fila["tr_name"]);
        $tr->setStatus($fila["tr_status"]);
        return true;						  
   }

   public static function sqlTodo()
   {   
       $misRegistros= BD::getInstance()->sqlSelectTodo("SELECT * FROM `treatment`");
       return $misRegistros;
   }

   public static function sqlListar()
   {   
       $misRegistros= BD::getInstance()->sqlSelectTodo("SELECT * FROM `treatment` WHERE tr_status = 1");
       return $misRegistros;
   }

}
?>
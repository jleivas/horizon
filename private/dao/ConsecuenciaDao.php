<?PHP

if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT']."/horizon";
require_once($rootDir . "/private/BD/bd.php");
require_once($rootDir . "/private/entities/Consecuencia.php");
class ConsecuenciaDao {
   public static function sqlInsert( $re)
   {
        $stSql  = "insert into result (";
        $stSql .= " re_id, re_name, re_status";
        $stSql .= " )values (";
        $stSql .= " '{$re->getId()}'"
                . ",'{$re->getName()}'"
                . ",'{$re->getStatus()}'"
                . ")";
		return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function sqladdId(){
        $bd=new BD();
        $misRegistros= $bd->sqlSelectTodo("SELECT MAX(re_id) FROM `result`");
        foreach($misRegistros as $fila) 
        {$var=$fila['MAX(re_id)'];}
        //le sumo 1
        $var=$var+1;
        return $var;
    }
   public static function sqlContar($param)
   {
        $stSql = "select * from result WHERE (re_id = {$param} OR re_name LIKE '%{$param}%')";
        return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function sqlExiste($param)
   {
        $stSql = "select * from result WHERE re_name = '{$param}'";
        return BD::getInstance()->sqlEjecutar($stSql);
   }
    public static function sqlBusrer($param)
   {
        $stSql = "select * from result WHERE re_name LIKE '%{$param}%'";
        return BD::getInstance()->sqlSelectTodo($stSql);
   }
   public static function sqlUpdate( $re)
   {
        $stSql =  "update result SET ";
        $stSql .= " re_name='{$re->getName()}'"
                . ",re_status='{$re->getStatus()}'"
                       ;
        $stSql .= " Where  re_id='{$re->getId()}'"
                       ;
        return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function sqlCargar( $id)
   {
        $stSql =  "select *  from  result ";
        $stSql .= " Where  re_id ={$id}"
                          ;
        $resultado= BD::getInstance()->sqlSelect($stSql);
  $fila= BD::getInstance()->sqlFetch();
  if (!$fila) return null;
  $reAux = new Consecuencia($fila["re_id"]
          ,$fila["re_name"]
          ,$fila["re_status"]);
        return $reAux;
   }
   // MÃ©todo que ejecuta una sentencia,
   // Sin embargo no retorna ningÃºn registro
   public static function sqlSelect( $re)
   {
        $stSql =  "select *  from  result ";
        $stSql .= " Where  re_id ={$re->getId()}"
                          ;
        $resultado= BD::getInstance()->sqlSelect($stSql);
	if(!$resultado) return false;
	return true;
   }
    
   public static function sqlFetch()
   {
  $fila= BD::getInstance()->sqlFetch();
  if (!$fila) return null;
  $reAux = new Consecuencia($fila["re_id"]
          ,$fila["re_name"]
          ,$fila["re_status"]);
        return $reAux;
   }
   public static function sqlFetchre($re)
   {
	$fila= BD::getInstance()->sqlFetch();
        if (!$fila) return false;
        $re->setId($fila["re_id"]);
        $re->setName($fila["re_name"]);
        $re->setStatus($fila["re_status"]);
        return true;						  
   }

   public static function sqlTodo()
   {   
       $misRegistros= BD::getInstance()->sqlSelectTodo("SELECT * FROM `result`");
       return $misRegistros;
   }

   public static function sqlListar()
   {   
       $misRegistros= BD::getInstance()->sqlSelectTodo("SELECT * FROM `result` WHERE re_status = 1");
       return $misRegistros;
   }

}
?>
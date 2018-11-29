<?PHP

if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT']."/horizon";
require_once($rootDir . "/private/BD/bd.php");
require_once($rootDir . "/private/entities/Condicion.php");
class CondicionDao {
   public static function sqlInsert( $cn)
   {
        $stSql  = "insert into condicion (";
        $stSql .= " cn_id, cn_name, cn_status";
        $stSql .= " )values (";
        $stSql .= " '{$cn->getId()}'"
                . ",'{$cn->getName()}'"
                . ",'{$cn->getStatus()}'"
                . ")";
		return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function sqladdId(){
        $bd=new BD();
        $misRegistros= $bd->sqlSelectTodo("SELECT MAX(cn_id) FROM `condicion`");
        foreach($misRegistros as $fila) 
        {$var=$fila['MAX(cn_id)'];}
        //le sumo 1
        $var=$var+1;
        return $var;
    }
   public static function sqlContar($param)
   {
        $stSql = "select * from condicion WHERE (cn_id = {$param} OR cn_name LIKE '%{$param}%')";
        return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function sqlExiste($param)
   {
        $stSql = "select * from condicion WHERE cn_name = '{$param}'";
        return BD::getInstance()->sqlEjecutar($stSql);
   }
    public static function sqlBuscar($param)
   {
        $stSql = "select * from condicion WHERE cn_name LIKE '%{$param}%'";
        return BD::getInstance()->sqlSelectTodo($stSql);
   }
   public static function sqlUpdate( $cn)
   {
        $stSql =  "update condicion SET ";
        $stSql .= " cn_name='{$cn->getName()}'"
                . ",cn_status='{$cn->getStatus()}'"
                       ;
        $stSql .= " Where  cn_id='{$cn->getId()}'"
                       ;
        return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function sqlCargar( $id)
   {
        $stSql =  "select *  from  condicion ";
        $stSql .= " Where  cn_id ={$id}"
                          ;
        $resultado= BD::getInstance()->sqlSelect($stSql);
  $fila= BD::getInstance()->sqlFetch();
  if (!$fila) return null;
  $cnAux = new Condicion($fila["cn_id"]
          ,$fila["cn_name"]
          ,$fila["cn_status"]);
        return $cnAux;
   }
   // MÃ©todo que ejecuta una sentencia,
   // Sin embargo no retorna ningÃºn registro
   public static function sqlSelect( $cn)
   {
        $stSql =  "select *  from  condicion ";
        $stSql .= " Where  cn_id ={$cn->getId()}"
                          ;
        $resultado= BD::getInstance()->sqlSelect($stSql);
	if(!$resultado) return false;
	return true;
   }
    
   public static function sqlFetch()
   {
  $fila= BD::getInstance()->sqlFetch();
  if (!$fila) return null;
  $cnAux = new CondicionDao($fila["cn_id"]
          ,$fila["cn_name"]
          ,$fila["cn_status"]);
        return $cnAux;
   }
   public static function sqlFetchcn($cn)
   {
	$fila= BD::getInstance()->sqlFetch();
        if (!$fila) return false;
        $cn->setId($fila["cn_id"]);
        $cn->setName($fila["cn_name"]);
        $cn->setStatus($fila["cn_status"]);
        return true;						  
   }

   public static function sqlTodo()
   {   
       $misRegistros= BD::getInstance()->sqlSelectTodo("SELECT * FROM `cobdicion`");
       return $misRegistros;
   }

   public static function sqlListar()
   {   
       $misRegistros= BD::getInstance()->sqlSelectTodo("SELECT * FROM `condicion` WHERE cn_status = 1");
       return $misRegistros;
   }

}
?>
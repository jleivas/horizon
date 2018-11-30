<?PHP

if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT']."/horizon";
require_once($rootDir . "/private/BD/bd.php");
require_once($rootDir . "/private/entities/Autor.php");
class AutorDao {
   public static function sqlInsert( $au)
   {
        $stSql  = "insert into author (";
        $stSql .= " au_id, au_name, au_status";
        $stSql .= " )values (";
        $stSql .= " '{$au->getId()}'"
                . ",'{$au->getName()}'"
                . ",'{$au->getStatus()}'"
                . ")";
		return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function sqladdId(){
        $bd=new BD();
        $misRegistros= $bd->sqlSelectTodo("SELECT MAX(au_id) FROM `author`");
        foreach($misRegistros as $fila) 
        {$var=$fila['MAX(au_id)'];}
        //le sumo 1
        $var=$var+1;
        return $var;
    }
   public static function sqlContar($param)
   {
        $stSql = "select * from author WHERE (au_id = {$param} OR au_name LIKE '%{$param}%')";
        return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function sqlExiste($param)
   {
        $stSql = "select * from author WHERE au_name = '{$param}'";
        return BD::getInstance()->sqlEjecutar($stSql);
   }
    public static function sqlBuscar($param)
   {
        $stSql = "select * from author WHERE au_name LIKE '%{$param}%'";
        return BD::getInstance()->sqlSelectTodo($stSql);
   }
   public static function sqlUpdate( $au)
   {
        $stSql =  "update author SET ";
        $stSql .= " au_name='{$au->getName()}'"
                . ",au_status='{$au->getStatus()}'"
                       ;
        $stSql .= " Where  au_id='{$au->getId()}'"
                       ;
        return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function sqlCargar( $id)
   {
        $stSql =  "select *  from  author ";
        $stSql .= " Where  au_id ={$id}"
                          ;
        $resultado= BD::getInstance()->sqlSelect($stSql);
  $fila= BD::getInstance()->sqlFetch();
  if (!$fila) return null;
  $auAux = new Autor($fila["au_id"]
          ,$fila["au_name"]
          ,$fila["au_status"]);
        return $auAux;
   }
   // MÃ©todo que ejecuta una sentencia,
   // Sin embargo no retorna ningÃºn registro
   public static function sqlSelect( $au)
   {
        $stSql =  "select *  from  author ";
        $stSql .= " Where  au_id ={$au->getId()}"
                          ;
        $resultado= BD::getInstance()->sqlSelect($stSql);
	if(!$resultado) return false;
	return true;
   }
    
   public static function sqlFetch()
   {
  $fila= BD::getInstance()->sqlFetch();
  if (!$fila) return null;
  $auAux = new Autor($fila["au_id"]
          ,$fila["au_name"]
          ,$fila["au_status"]);
        return $auAux;
   }
   public static function sqlFetchau($au)
   {
	$fila= BD::getInstance()->sqlFetch();
        if (!$fila) return false;
        $au->setId($fila["au_id"]);
        $au->setName($fila["au_name"]);
        $au->setStatus($fila["au_status"]);
        return true;						  
   }

   public static function sqlTodo()
   {   
       $misRegistros= BD::getInstance()->sqlSelectTodo("SELECT * FROM `author`");
       return $misRegistros;
   }

   public static function sqlListar()
   {   
       $misRegistros= BD::getInstance()->sqlSelectTodo("SELECT * FROM `author` WHERE au_status = 1");
       return $misRegistros;
   }

}
?>
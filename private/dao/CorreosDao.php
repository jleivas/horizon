<?PHP
// Declaramos una variable $rootDir si es que no existe
// isset==> si existe o no una variable
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT']."/horizon";
//Agregamos desde BD.PHPy la Entitie Usuario
// desde el Path raiz ==> $rootDir
require_once($rootDir . "/private/BD/bd.php");
require_once($rootDir . "/private/entities/Correos.php");
class CorreosDao {
  
   public static function sqlInsert($mail)
   {
        $stSql  = "insert into correos (";
        $stSql .= " corr_correo ,corr_estado";
        $stSql .= " )values (";
        $stSql .= " '{$mail}'"
                . ",'1'"
                . ")";
		return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function anular($mail)
   {
        $stSql =  "update correos SET ";
        $stSql .= " corr_estado='0'"
                       ;
        $stSql .= " Where  corr_correo='{$mail}'"
                       ;
        return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function activar($mail)
   {
        $stSql =  "update correos SET ";
        $stSql .= " corr_estado='1'"
                       ;
        $stSql .= " Where  corr_correo='{$mail}'"
                       ;
        return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function activarError($mail)
   {
        $stSql =  "update correos SET ";
        $stSql .= " corr_estado='2'"
                       ;
        $stSql .= " Where  corr_correo='{$mail}'"
                       ;
        return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function sqlFound($mail)
   {
        $stSql = "select * from correos WHERE  corr_correo = '{$mail}'";
        return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function sqlTodo()
   {   
       $misRegistros= BD::getInstance()->sqlSelectTodo("SELECT * FROM `correos` WHERE `corr_estado`=1");
       return $misRegistros;
   }
   public static function sqlTodoLimit($inicio,$tam_pag)
   {   
       $misRegistros= BD::getInstance()->sqlSelectTodo("SELECT * FROM `correos` WHERE `corr_estado`=1 LIMIT {$inicio},{$tam_pag}");
       return $misRegistros;
   }
   public static function sqlBuscar($param)
   {   
       $misRegistros= BD::getInstance()->sqlSelectTodo("SELECT * FROM `correos` WHERE `corr_estado`=1 and corr_correo LIKE '%{$param}%'");
       return $misRegistros;
   }
   public static function sqlContarTodo()
   {
        $stSql = "select * from correos WHERE corr_estado=1";
        return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function sqlContarBusqueda($param)
   {
        $stSql = "SELECT * FROM `correos` WHERE `corr_estado`=1 and corr_correo LIKE '%{$param}%'";
        return BD::getInstance()->sqlEjecutar($stSql);
   }
}
?>
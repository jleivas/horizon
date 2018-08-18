<?PHP
// Declaramos una variable $rootDir si es que no existe
// isset==> si existe o no una variable
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT']."/horizon";
//Agregamos desde BD.PHPy la Entitie company
// desde el Path raiz ==> $rootDir
require_once($rootDir . "/private/BD/bd.php");
require_once($rootDir . "/private/entities/Company.php");
class CompanyDao {
   public static function sqlInsert( $company)
   {
        $stSql  = "insert into company (";
        $stSql .= " cm_cod, cm_name, user_us_cod, cm_status";
        $stSql .= " )values (";
        $stSql .= " '{$company->getCod()}'"
                . ",'{$company->getName()}'"
                . ",'{$company->getUser()}'"
                . ",'{$company->getStatus()}'"
                . ")";
		return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function sqlContar($param)
   {
        $stSql = "select * from company WHERE (cm_cod LIKE '%{$param}%' OR cm_name LIKE '%{$param}%')";
        return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function sqlExiste($param)
   {
        $stSql = "select * from company WHERE cm_cod = '{$param}'";
        return BD::getInstance()->sqlEjecutar($stSql);
   }
    public static function sqlBuscar($param)
   {
        $stSql = "select * from company WHERE cm_name LIKE '%{$param}%'";
        return BD::getInstance()->sqlSelectTodo($stSql);
   }
   public static function sqlUpdate( $company)
   {
        $stSql =  "update company SET ";
        $stSql .= " cm_name='{$company->getName()}'"
                . ",user_us_cod='{$company->getUser()}'"
                . ",cm_status='{$company->getStatus()}'"
                       ;
        $stSql .= " Where  cm_cod='{$company->getCod()}'"
                       ;
        return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function sqlCargar( $cod)
   {
        $stSql =  "select *  from  company ";
        $stSql .= " Where  cm_cod ='{$cod}'"
                          ;
        $resultado= BD::getInstance()->sqlSelect($stSql);
  $fila= BD::getInstance()->sqlFetch();
  if (!$fila) return null;
  $companyAux = new Company($fila["cm_cod"]
          ,$fila["cm_name"]
          ,$fila["user_us_cod"]
          ,$fila["cm_status"]);
        return $companyAux;
   }
   // MÃ©todo que ejecuta una sentencia,
   // Sin embargo no retorna ningÃºn registro
   public static function sqlSelect( $company)
   {
        $stSql =  "select *  from  company ";
        $stSql .= " Where  cm_cod ='{$company->getCod()}'"
                          ;
        $resultado= BD::getInstance()->sqlSelect($stSql);
	if(!$resultado) return false;
	return true;
   }
    
   public static function sqlFetch()
   {
  $fila= BD::getInstance()->sqlFetch();
  if (!$fila) return null;
  $companyAux = new Company($fila["cm_cod"]
          ,$fila["cm_name"]
          ,$fila["user_us_cod"]
          ,$fila["cm_status"]);
        return $companyAux;
   }
   public static function sqlFetchcompany($company)
   {
	$fila= BD::getInstance()->sqlFetch();
        if (!$fila) return false;
        $company->setCod($fila["cm_cod"]);
        $company->setName($fila["cm_name"]);
        $company->setUser($fila["user_us_cod"]);
        $company->setStatus($fila["cm_status"]);
        return true;						  
   }

   public static function sqlTodo()
   {   
       $misRegistros= BD::getInstance()->sqlSelectTodo("SELECT * FROM `company`");
       return $misRegistros;
   }

}
?>
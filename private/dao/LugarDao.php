<?PHP
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT']."/horizon";
require_once($rootDir . "/private/BD/bd.php");
require_once($rootDir . "/private/entities/Lugar.php");
class lugarDao {
        public static function sqladdId(){
                $bd=new BD();
               $misRegistros= $bd->sqlSelectTodo("SELECT MAX(pl_id) FROM `place`");
                foreach($misRegistros as $fila) 
                {$var=$fila['MAX(pl_id)'];}
              //le sumo 1
               $var=$var+1;
               return $var;
          }

   public static function sqlInsert( $lugar)
   {
        $stSql  = "insert into place (";
        $stSql .= " pl_id, pl_name, pl_desc, company_cm_cod, pl_phone1, pl_phone2, pl_mail,";
        $stSql .= "pl_web, pl_address, pl_city, pl_province, pl_country,cliente_us_cod,auditor_us_cod, pl_status";
        $stSql .= " )values (";
        $stSql .= " '{$lugar->getId()}'"
                . ",'{$lugar->getName()}'"
                . ",'{$lugar->getDesc()}'"
                . ",'{$lugar->getCompany()}'"
                . ",'{$lugar->getPhone1()}'"
                . ",'{$lugar->getPhone2()}'"
                . ",'{$lugar->getMail()}'"
                . ",'{$lugar->getWeb()}'"
                . ",'{$lugar->getAddress()}'"
                . ",'{$lugar->getCity()}'"
                . ",'{$lugar->getProvince()}'"
                . ",'{$lugar->getCountry()}'"
                . ",'{$lugar->getCliente()}'"
                . ",'{$lugar->getAuditor()}'"
                . ",'{$lugar->getStatus()}'"
                . ")";
		return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function sqlContar($param)
   {
        $stSql = "select * from place WHERE (pl_name LIKE '%{$param}%')";
        return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function sqlExiste($param)
   {
        $stSql = "select * from place WHERE pl_id = '{$param}'";
        return BD::getInstance()->sqlEjecutar($stSql);
   }
    public static function sqlBuscar($param)
   {
        $stSql = "select * from place WHERE pl_name LIKE '%{$param}%'";
        return BD::getInstance()->sqlSelectTodo($stSql);
   }
   public static function sqlUpdate( $lugar)
   {
        $stSql =  "update place SET ";
        $stSql .= " pl_name='{$lugar->getName()}'"
                . ",pl_desc='{$lugar->getDesc()}'"
                . ",company_cm_cod='{$lugar->getCompany()}'"
                . ",pl_phone1='{$lugar->getPhone1()}'"
                . ",pl_phone2='{$lugar->getPhone2()}'"
                . ",pl_mail='{$lugar->getMail()}'"
                . ",pl_web='{$lugar->getWeb()}'"
                . ",pl_address='{$lugar->getAddress()}'"
                . ",pl_city='{$lugar->getCity()}'"
                . ",pl_province='{$lugar->getProvince()}'"
                . ",pl_country='{$lugar->getCountry()}'"
                . ",cliente_us_cod='{$lugar->getCliente()}'"
                . ",auditor_us_cod='{$lugar->getAuditor()}'"
                . ",pl_status='{$lugar->getStatus()}'"
                       ;
        $stSql .= " Where  pl_id='{$lugar->getId()}'"
                       ;
        return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function sqlCargar( $id)
   {
        $stSql =  "select * from place ";
        $stSql .= " Where  pl_id ={$id}"
                          ;
        $resultado= BD::getInstance()->sqlSelect($stSql);
  $fila= BD::getInstance()->sqlFetch();
  if (!$fila) return null;
  $lugarAux = new Lugar($fila["pl_id"]
          ,$fila["pl_name"]
          ,$fila["pl_desc"]
          ,$fila["company_cm_cod"]
          ,$fila["pl_phone1"]
          ,$fila["pl_phone2"]
          ,$fila["pl_mail"]
          ,$fila["pl_web"]
          ,$fila["pl_address"]
          ,$fila["pl_city"]
          ,$fila["pl_province"]
          ,$fila["pl_country"]
          ,$fila["cliente_us_cod"]
          ,$fila["auditor_us_cod"]
          ,$fila["pl_status"]);
        return $lugarAux;
   }
   public static function sqlSelect( $lugar)
   {
        $stSql =  "select * from place ";
        $stSql .= " Where  pl_id ='{$lugar->getId()}'"
                          ;
        $resultado= BD::getInstance()->sqlSelect($stSql);
	if(!$resultado) return false;
	return true;
   }
   public static function sqlFetch()
   {
  $fila= BD::getInstance()->sqlFetch();
  if (!$fila) return null;
  $lugarAux = new Lugar($fila["pl_id"]
          ,$fila["pl_name"]
          ,$fila["pl_desc"]
          ,$fila["company_cm_cod"]
          ,$fila["pl_phone1"]
          ,$fila["pl_phone2"]
          ,$fila["pl_mail"]
          ,$fila["pl_web"]
          ,$fila["pl_address"]
          ,$fila["pl_city"]
          ,$fila["pl_province"]
          ,$fila["pl_country"]
          ,$fila["cliente_us_cod"]
          ,$fila["auditor_us_cod"]
          ,$fila["pl_status"]);
        return $lugarAux;
   }
   public static function sqlFetchlugar($lugar)
   {
	$fila= BD::getInstance()->sqlFetch();
        if (!$fila) return false;
        $lugar->setId($fila["pl_id"]);
        $lugar->setName($fila["pl_name"]);
        $lugar->setCompany($fila["company_cm_cod"]);
        $lugar->setPhone1($fila["pl_phone1"]);
        $lugar->setPhone2($fila["pl_phone2"]);
        $lugar->setMail($fila["pl_mail"]);
        $lugar->setWeb($fila["pl_web"]);
        $lugar->setAddress($fila["pl_address"]);
        $lugar->setCity($fila["pl_city"]);
        $lugar->setProvince($fila["pl_province"]);
        $lugar->setCountry($fila["pl_country"]);
        $lugar->setCliente($fila["cliente_us_cod"]);
        $lugar->setAuditor($fila["auditor_us_cod"]);
        $lugar->setStatus($fila["pl_status"]);
        return true;						  
   }

   public static function sqlTodo()
   {   
       
       $misRegistros= BD::getInstance()->sqlSelectTodo("SELECT * FROM `place`");
       return $misRegistros;
   }

   public static function sqlByCompany($companyCod)
   {   
       
       $misRegistros= BD::getInstance()->sqlSelectTodo("SELECT * FROM `place` where company_cm_cod = '{$companyCod}'");
       return $misRegistros;
   }

}
?>
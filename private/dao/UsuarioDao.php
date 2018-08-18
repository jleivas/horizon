<?PHP
// Declaramos una variable $rootDir si es que no existe
// isset==> si existe o no una variable
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT']."/horizon";
//Agregamos desde BD.PHPy la Entitie Usuario
// desde el Path raiz ==> $rootDir
require_once($rootDir . "/private/BD/bd.php");
require_once($rootDir . "/private/entities/Usuario.php");
class UsuarioDao {
   public static function sqlInsert( $usuario)
   {
        $stSql  = "insert into usuario (";
        $stSql .= " us_cod, us_name, us_pass, us_tipo, us_phone1, us_phone2, us_mail,";
        $stSql .= "us_web, us_address, us_city, us_province, us_country,us_avatar, us_status";
        $stSql .= " )values (";
        $stSql .= " '{$usuario->getCod()}'"
                . ",'{$usuario->getName()}'"
                . ",'{$usuario->getPass()}'"
                . ",'{$usuario->getTipo()}'"
                . ",'{$usuario->getPhone1()}'"
                . ",'{$usuario->getPhone2()}'"
                . ",'{$usuario->getMail()}'"
                . ",'{$usuario->getWeb()}'"
                . ",'{$usuario->getAddress()}'"
                . ",'{$usuario->getCity()}'"
                . ",'{$usuario->getProvince()}'"
                . ",'{$usuario->getCountry()}'"
                . ",'{$usuario->getAvatar()}'"
                . ",'{$usuario->getstatus()}'"
                . ")";
		return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function sqlContar($param)
   {
        $stSql = "select * from usuario WHERE (us_cod LIKE '%{$param}%' OR us_name LIKE '%{$param}%')";
        return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function sqlExiste($param)
   {
        $stSql = "select * from usuario WHERE us_cod = '{$param}'";
        return BD::getInstance()->sqlEjecutar($stSql);
   }
    public static function sqlBuscar($param)
   {
        $stSql = "select * from usuario WHERE us_name LIKE '%{$param}%'";
        return BD::getInstance()->sqlSelectTodo($stSql);
   }
   public static function sqlUpdate( $usuario)
   {
        $stSql =  "update usuario SET ";
        $stSql .= " us_name='{$usuario->getName()}'"
                . ",us_pass='{$usuario->getPass()}'"
                . ",us_tipo='{$usuario->getTipo()}'"
                . ",us_phone1='{$usuario->getPhone1()}'"
                . ",us_phone2='{$usuario->getPhone2()}'"
                . ",us_mail='{$usuario->getMail()}'"
                . ",us_web='{$usuario->getWeb()}'"
                . ",us_address='{$usuario->getAddress()}'"
                . ",us_city='{$usuario->getCity()}'"
                . ",us_province='{$usuario->getProvince()}'"
                . ",us_country='{$usuario->getCountry()}'"
                . ",us_avatar='{$usuario->getAvatar()}'"
                . ",us_status='{$usuario->getStatus()}'"
                       ;
        $stSql .= " Where  us_cod='{$usuario->getCod()}'"
                       ;
        return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function sqlCargar( $cod)
   {
        $stSql =  "select *  from  usuario ";
        $stSql .= " Where  us_cod ='{$cod}'"
                          ;
        $resultado= BD::getInstance()->sqlSelect($stSql);
  //if(!$resultado) return null;
  $fila= BD::getInstance()->sqlFetch();
  // Si fila esta vacia,no hay registro devuelve null
  if (!$fila) return null;
  // Llena los valores que faltan a la instancia
  // entregada por parÃ¡metro $actor
  $usuarioAux = new Usuario($fila["us_cod"]
          ,$fila["us_name"]
          ,$fila["us_pass"]
          ,$fila["us_tipo"]
          ,$fila["us_phone1"]
          ,$fila["us_phone2"]
          ,$fila["us_mail"]
          ,$fila["us_web"]
          ,$fila["us_address"]
          ,$fila["us_city"]
          ,$fila["us_province"]
          ,$fila["us_country"]
          ,$fila["us_avatar"]
          ,$fila["us_status"]);
        return $usuarioAux;
   }
   // MÃ©todo que ejecuta una sentencia,
   // Sin embargo no retorna ningÃºn registro
   public static function sqlSelect( $usuario)
   {
        $stSql =  "select *  from  usuario ";
        $stSql .= " Where  us_cod ='{$usuario->getCod()}'"
                          ;
        $resultado= BD::getInstance()->sqlSelect($stSql);
	if(!$resultado) return false;
	return true;
   }
    // MÃ©todo que ejecuta una sentencia,
   // Sin embargo no retorna ningÃºn registro
   public static function sqlValida( $user,$pass)
   {
        $stSql =  "select *  from  usuario ";
        $stSql .= " Where  us_mail ='{$user}' AND us_pass ='{$pass}'"
                          ;
        $resultado= BD::getInstance()->sqlSelect($stSql);
  //if(!$resultado) return null;
  $fila= BD::getInstance()->sqlFetch();
  // Si fila esta vacia,no hay registro devuelve null
  if (!$fila) return null;
  // Llena los valores que faltan a la instancia
  // entregada por parÃ¡metro $actor
  $usuarioAux = new Usuario($fila["us_cod"]
          ,$fila["us_name"]
          ,$fila["us_pass"]
          ,$fila["us_tipo"]
          ,$fila["us_phone1"]
          ,$fila["us_phone2"]
          ,$fila["us_mail"]
          ,$fila["us_web"]
          ,$fila["us_address"]
          ,$fila["us_city"]
          ,$fila["us_province"]
          ,$fila["us_country"]
          ,$fila["us_avatar"]
          ,$fila["us_status"]);
        return $usuarioAux;
   }
   // MÃ©todo que busca el siguiente registro disponible
   // De acuerdo a la sentencia sql ejecutada por sqlSelect
   // crea una instancia de actory la devuelve
   // Observe que no recibe parÃ¡metro, ya que retorna un actor
   public static function sqlFetch()
   {
  // Retorna un registro
  $fila= BD::getInstance()->sqlFetch();
  // Si fila esta vacia,no hay registro devuelve null
  if (!$fila) return null;
  // Llena los valores que faltan a la instancia
  // entregada por parÃ¡metro $actor
  $usuarioAux = new Usuario($fila["us_cod"]
          ,$fila["us_name"]
          ,$fila["us_pass"]
          ,$fila["us_tipo"]
          ,$fila["us_phone1"]
          ,$fila["us_phone2"]
          ,$fila["us_mail"]
          ,$fila["us_web"]
          ,$fila["us_address"]
          ,$fila["us_city"]
          ,$fila["us_province"]
          ,$fila["us_country"]
          ,$fila["us_avatar"]
          ,$fila["us_status"]);
        return $usuarioAux;
   }
   public static function sqlFetchUsuario($usuario)
   {
	// Retorna un registro
	$fila= BD::getInstance()->sqlFetch();
	// Si fila esta vacia,no hay registro devuelve false
        if (!$fila) return false;
	// Llena los valores que faltan a la instancia
	// entregada por parÃ¡metro $actor
        $usuario->setCod($fila["us_cod"]);
        $usuario->setName($fila["us_name"]);
        $usuario->setPass($fila["us_pass"]);
        $usuario->setTipo($fila["us_tipo"]);
        $usuario->setPhone1($fila["us_phone1"]);
        $usuario->setPhone2($fila["us_phone2"]);
        $usuario->setMail($fila["us_mail"]);
        $usuario->setWeb($fila["us_web"]);
        $usuario->setAddress($fila["us_address"]);
        $usuario->setCity($fila["us_city"]);
        $usuario->setProvince($fila["us_province"]);
        $usuario->setCountry($fila["us_country"]);
        $usuario->setAvatar($fila["us_avatar"]);
        $usuario->setStatus($fila["us_status"]);
        return true;						  
   }

   public static function sqlTodo()
   {   //$bd=new BD();
       
       $misRegistros= BD::getInstance()->sqlSelectTodo("SELECT * FROM `usuario`");
       return $misRegistros;
   }

}
?>
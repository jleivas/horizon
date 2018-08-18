<?PHP
 class BD{
    // enlace ==> variable que nos permite tener la conexion abierta
    private $enlace;
    // Ip de Servidor de la Base de Datos
    private $stHost='127.0.0.1';
	// Podemos cambiar el usuario y o la clave  
	// para darnos cuenta que nos da un error 
	// o sea funciona
    // Usuario de conexiÃ³n de la Base de Datos
    private $stUsuario='root'; 
    // clave de conexiÃ³n de la Base de Datos
    private $stClave='';
    // Nombre  de la Base de Datos
    private $stBd='cps';
    // Constructor de BD
    public function BD()
    {
		//$mbd = new PDO('mysql:host=localhost;dbname=prueba', $usuario, $contraseÃ±a);
		 $this->enlace = new PDO("mysql:host=" . $this->stHost . ";dbname=" .$this->stBd
                                         ,$this->stUsuario
                                         ,$this->stClave);
    }
    // Ejecuta una instrucciÃ³n Insert, Update o Delete
        // Recibe como parÃ¡metro la sentencia sql.
    public function sqlEjecutar($stSql)
    {
            // Prepara la sentencia sql
                // en la BD abierta, asociada al enlace
            $sentencia = $this->enlace->prepare($stSql);
        // Ejecuta la sentencia Sql
        $resultado = $sentencia->execute();
        // Si el resultado es true ejecuta la sentencia sin problemas
        if (!$resultado) 
            print_r($sentencia->errorInfo());
        // El hecho que se ejecute
        // , no significa que existan registros afectados
        // por lo tanto retornamos la cantidad de registros afectados
        return $sentencia->rowCount();
    }    
    // Agregamos la variable miRs
    // , para tener el control de la lectura
    private $miRs;
    // Ejecuta una sentencia SQL y devuelve un cursor   
    public function sqlSelect($stSql)
    {
        // Prepara la sentencia, en BD asociada a enlace 
        // Observe que se enlaza con la variable $miRs
        // la cual se encuentra declarada en la clase
        $this->miRs = $this->enlace->prepare($stSql);
        // Ejecuta la sentencia sql
        return $this->miRs->execute();
    }     
    // Permite rescatar de la BD, el siguiente registro
    // Devuelve un arreglo con el registro leÃ­do
    // por medio de la variable miRS
    public function sqlFetch()
    {
        return $this->miRs->fetch();
    } 

    // Permite leer todos los registros de la BD
    // Que cumplan con la condiciÃ³n
    // Retorna un arreglo con los datos 
    public function sqlSelectTodo($stSql)
    {
        // Prepara y EJECUTA la sentencia
        //   , en la bd asociada al enlace
        // Retorna un arreglo con todos los registros
        return $this->enlace->query($stSql);
    }   


    //permite crear una coneccion una sola vez, existen instrucciones en las bases de datos para saber cuanta conecciones hay
    private static $miConexion;
   
    public static function getInstance(){
        if (self::$miConexion == null){//la variable es estatica por lo tanto ya no es this, es self y no se usa -> sino ::
           //echo "Instancia Nulla<br>";
           self::$miConexion = new BD();
        }
         return self::$miConexion;
    }
 }
?>
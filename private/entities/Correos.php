<?PHP
// Incluimos el archivo de excepciones
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
   class Correo {
           // Atributos
		private $correo;		
		private $estado;

		   
           // Mutadores y Accesadores
		public function getCorreo(){
			return $this->correo;
		}
		public function setCorreo($correo){
			$this->correo = $correo;
		}

		public function getEstado(){
			return $this->estado;
		}
		public function setEstado($estado){
			$this->estado = $estado;
		}
		
		  
           // Constructor
		public function Correo($correo=0, $estado="1")
		{
			$this->setCorreo($correo);
			$this->setEstado($estado);
		}
		// Destructor
	    function __destruct() {
		echo "<a></a>";
            }
		   
        public function __toString(){
        // Registro JSon
		return "{" 
		          . chr(34) . "Correo" . chr(34) . ":" . chr(34) . $this->getCorreo() . chr(34) 
		    . "," . chr(34) . "Estado" . chr(34) . ":" . chr(34) . $this->getEstado() . chr(34) 
		 . "}";
   		}   
   		public function imprimir()
   		{
        	echo $this->__toString();
   		}
   }
?>
<?PHP
   class Accion {
   		private $id;
		private $name;
        private $status;
		   
         
		public function getId()
		{
			return $this->id;
		}
		public function setId($id){
			$this->id = $id;
		}
		public function getName()
		{
			return $this->name;
		}
		public function setName($name)
		{
			$this->name = $name;
		}
        
        public function getStatus()
		{
			return $this->status;
		}		
		public function setStatus($status)
		{
			$this->status = $status;
        }
	 	   
           // Constructor
        public function Accion($id=0, $name="null",$status=0)
		{
            $this->setId($id);
            $this->setName($name);
            $this->setStatus($status);
		}
	    function __destruct() {
		echo "<a></a>";
            }
        public function __toString(){
		return "{" 
		          . chr(34) . "Id" . chr(34) . ":" . chr(34) . $this->getId() . chr(34) 
		    . "," . chr(34) . "Nombre" . chr(34) . ":" . chr(34) . $this->getName() . chr(34) 
		    . "," . chr(34) . "Estado" . chr(34) . ":" . chr(34) . $this->getStatus() . chr(34) 
		 . "}";
   		}   
   		public function imprimir()
   		{
        	echo $this->__toString();
   		}
   }
?>
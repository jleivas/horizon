<?PHP
   class Company {
   		private $cod;
		private $name;
		private $user;
        private $status;
		   
         
		public function getCod()
		{
			return $this->cod;
		}
		public function setCod($cod){
			$this->cod = $cod;
		}
		public function getName()
		{
			return $this->name;
		}
		public function setName($name)
		{
			$this->name = $name;
		}
		public function getUser()
		{
			return $this->user;
		}
		public function setUser($user)
		{
			$this->user = $user;
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
        public function Company($cod="null", $name="null",$user="null",$status=0)
		{
            $this->setCod($cod);
            $this->setName($name);
            $this->setUser($user);
            $this->setStatus($status);
		}
	    function __destruct() {
		echo "<a></a>";
            }
        public function __toString(){
		return "{" 
		          . chr(34) . "Cod" . chr(34) . ":" . chr(34) . $this->getCod() . chr(34) 
		    . "," . chr(34) . "Nombre" . chr(34) . ":" . chr(34) . $this->getName() . chr(34) 
		    . "," . chr(34) . "ID User" . chr(34) . ":" . chr(34) . $this->getUser() . chr(34) 
		    . "," . chr(34) . "Estado" . chr(34) . ":" . chr(34) . $this->getStatus() . chr(34) 
		 . "}";
   		}   
   		public function imprimir()
   		{
        	echo $this->__toString();
   		}
   }
?>
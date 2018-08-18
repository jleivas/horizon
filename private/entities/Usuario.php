<?PHP
// Incluimos el archivo de excepciones
//if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
   class Usuario {
           // AtributosÂ¿
   		private $cod;
		private $name;
		private $pass;
		private $tipo;		   
		private $phone1;
		private $phone2;
		private $mail;
        private $web;
        private $address;
        private $city;
        private $province;
        private $country;
        private $avatar;
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
		public function getPass()
		{
			return $this->pass;
		}
		public function setPass($pass)
		{
			$this->pass = $pass;
		}
		public function getTipo()
		{
			return $this->tipo;
		}		
		public function setTipo($tipo)
		{
			$this->tipo = $tipo;
		}
		public function getPhone1()
		{
			return $this->phone1;
		}		
		public function setPhone1($phone1)
		{
			$this->phone1 = $phone1;
		}
		public function getPhone2()
		{
			return $this->phone2;
		}		
		public function setPhone2($phone2)
		{
			$this->phone2 = $phone2;
		}	
		public function getMail()
		{
			return $this->mail;
		}		
		public function setMail($mail)
		{
			$this->mail = $mail;
		}	

		public function getEmail()
		{
			return $this->mail;
		}		
		public function setEmail($mail)
		{
			$this->mail = $mail;
		}	
		
		public function getWeb()
		{
			return $this->web;
		}		
		public function setWeb($web)
		{
			$this->web = $web;
        }

        public function getAddress()
		{
			return $this->address;
		}		
		public function setAddress($address)
		{
			$this->address = $address;
        }
        
        public function getCity()
		{
			return $this->city;
		}		
		public function setCity($city)
		{
			$this->city = $city;
        }

        public function getprovince()
		{
			return $this->province;
		}		
		public function setProvince($province)
		{
			$this->province = $province;
        }

        public function getCountry()
		{
			return $this->country;
		}		
		public function setCountry($country)
		{
			$this->country = $country;
        }

        public function getAvatar()
		{
			return $this->avatar;
		}		
		public function setAvatar($avatar)
		{
			$this->avatar = $avatar;
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
        public function Usuario($cod="null", $name="null",$pass="null",$tipo=0,$phone1="null",$phone2="null",
        $mail="null",$web="null",$address="null",$city="null",$province="null",$country="null",$avatar="null",$status=0)
		{
            $this->setCod($cod);
            $this->setName($name);
            $this->setPass($pass);
            $this->setTipo($tipo);
            $this->setPhone1($phone1);
            $this->setPhone2($phone2);
            $this->setMail($mail);	
            $this->setWeb($web);  
            $this->setAddress($address);
            $this->setCity($city);
            $this->setProvince($province);
            $this->setCountry($country);
            $this->setAvatar($avatar);
            $this->setStatus($status);
		}
// Destructor
	    function __destruct() {
		echo "<a></a>";
            }
		   // Constructor
		//public function Usuario($rut=1111111, $dv=1, $medidor=0, $nombre="null",$apellido="null",$mail=null,$telefono=null,$direccion="null",$tipo="USER",$password="null")
		
         
			   
           // toString
           // imprimir
        public function __toString(){
        // Registro JSon
		return "{" 
		          . chr(34) . "Cod" . chr(34) . ":" . chr(34) . $this->getCod() . chr(34) 
		    . "," . chr(34) . "Nombre" . chr(34) . ":" . chr(34) . $this->getName() . chr(34) 
		    . "," . chr(34) . "Pais" . chr(34) . ":" . chr(34) . $this->getCountry() . chr(34) 
		    . "," . chr(34) . "Mail" . chr(34) . ":" . chr(34) . $this->getMail() . chr(34) 
		 . "}";
   		}   
   		public function imprimir()
   		{
        	echo $this->__toString();
   		}
   }
   
// Una vez que este Listo eliminar este cÃ³digo   
//$usuario = new Usuario();
//var_dump($usuario);
//$usuario = new Usuario(234,null,"Valdivia","2017-01-01");
//var_dump($actor);
// Para realizar pruebas
//$actor = new Actor(325,"Juan","Valdivia");
//echo "Imprimir ";
//$actor->imprimir(); // llama imprimir el cual reutiliza __toString()
//echo "ToString : " . $actor; // al concatenar, automÃ¡ticamente llama a __toString
?>
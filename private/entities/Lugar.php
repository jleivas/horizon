<?PHP
    class Lugar {
   		private $id;
		private $name;
		private $desc;
		private $company;		   
		private $phone1;
		private $phone2;
		private $mail;
        private $web;
        private $address;
        private $city;
        private $province;
        private $country;
		private $cliente;
		private $auditor;
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
		public function getDesc()
		{
			return $this->desc;
		}
		public function setDesc($desc)
		{
			$this->desc = $desc;
		}
		public function getCompany()
		{
			return $this->company;
		}		
		public function setCompany($company)
		{
			$this->company = $company;
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

        public function getProvince()
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

        public function getCliente()
		{
			return $this->cliente;
		}		
		public function setCliente($cliente)
		{
			$this->cliente = $cliente;
		}
		
		public function getAuditor()
		{
			return $this->auditor;
		}		
		public function setAuditor($auditor)
		{
			$this->auditor = $auditor;
        }

        public function getStatus()
		{
			return $this->status;
		}		
		public function setStatus($status)
		{
			$this->status = $status;
        }
        
        public function Lugar($id=0, $name="null",$desc="null",$company="null",$phone1="null",$phone2="null",
        $mail="null",$web="null",$address="null",$city="null",$province="null",$country="null",$cliente="null",$auditor="null",$status=0)
		{
            $this->setId($id);
            $this->setName($name);
            $this->setDesc($desc);
            $this->setCompany($company);
            $this->setPhone1($phone1);
            $this->setPhone2($phone2);
            $this->setMail($mail);	
            $this->setWeb($web);  
            $this->setAddress($address);
            $this->setCity($city);
            $this->setProvince($province);
            $this->setCountry($country);
			$this->setCliente($cliente);
			$this->setAuditor($auditor);
            $this->setStatus($status);
		}
	    function __destruct() {
		echo "<a></a>";
            }
        public function __toString(){
		return "{" 
		          . chr(34) . "Id" . chr(34) . ":" . chr(34) . $this->getId() . chr(34) 
		    . "," . chr(34) . "Nombre" . chr(34) . ":" . chr(34) . $this->getName() . chr(34) 
            . "," . chr(34) . "Pais" . chr(34) . ":" . chr(34) . $this->getCountry() . chr(34)
            . "," . chr(34) . "Cliente" . chr(34) . ":" . chr(34) . $this->getCliente() . chr(34) 
		    . "," . chr(34) . "Mail" . chr(34) . ":" . chr(34) . $this->getMail() . chr(34) 
		 . "}";
   		}   
   		public function imprimir()
   		{
        	echo $this->__toString();
   		}
   }
?>
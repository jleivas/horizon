<?PHP
   	class Correccion {
		private $id;
		private $idEval;
		private $tratamiento;
		private $accion1;
		private $respAccion1;		   
		private $accion2;
		private $respAccion2;
		private $condicion1;
		private $respCondicion1;
        private $condicion2;
        private $respCondicion2;
        private $planAccion;
        private $planCorreccion;
        private $idUser;
		private $status;

        public function Correccion($id=0, $idEval=0,$tratamiento=0,$accion1=0,$respAccion1=0,
        $accion2=0,$respAccion2=0,$condicion1=0,$respCondicion1=0,$condicion2=0,$respCondicion2=0,
        $planAccion="null",$planCorreccion="null",$idUser="null",$status=0)
		{
            $this->setId($id);
            $this->setIdEval($idEval);
            $this->setTratamiento($tratamiento);
            $this->setAccion1($accion1);
            $this->setRespAccion1($respAccion1);
            $this->setAccion2($accion2);
            $this->setRespAccion2($respAccion2);	
            $this->setCondicion1($condicion1);  
            $this->setRespCondicion1($respCondicion1);
            $this->setCondicion2($condicion2);
            $this->setRespCondicion2($respCondicion2);
            $this->setPlanAccion($planAccion);
            $this->setPlanCorreccion($planCorreccion);
            $this->setIdUser($idUser);
            $this->setStatus($status);
		}

        /* GETTERS */
		public function getId()
		{
			return $this->id;
		}

		public function getIdEval()
		{
			return $this->idEval;
		}

		public function getTratamiento()
		{
			return $this->tratamiento;
		}

		public function getAccion1()
		{
			return $this->accion1;
		}

		public function getRespAccion1()
		{
			return $this->respAccion1;
		}

		public function getAccion2()
		{
			return $this->accion2;
		}

		public function getRespAccion2()
		{
			return $this->respAccion2;
		}

		public function getCondicion1()
		{
			return $this->condicion1;
		}

		public function getRespCondicion1()
		{
			return $this->respCondicion1;
		}

		public function getCondicion2()
		{
			return $this->condicion2;
		}

		public function getRespCondicion2()
		{
			return $this->respCondicion2;
        }
        
        public function getPlanAccion()
		{
			return $this->planAccion;
        }
        
        public function getPlanCondicion()
		{
			return $this->planCorreccion;
        }
        
        public function getIdUser()
		{
			return $this->idUser;
        }
        
        public function getStatus()
		{
			return $this->status;
        }
        
        /*SETTERS */

		public function setId($id)
		{
			$this->id = $id;
		}

		public function setIdEval($idEval)
		{
			$this->idEval = $idEval;
		}

		public function setTratamiento($tratamiento)
		{
			$this->tratamiento = $tratamiento;
		}

		public function setAccion1($accion1)
		{
			$this->accion1 = $accion1;
		}

		public function setRespAccion1($respAccion1)
		{
		    $this->respAccion1 = $respAccion1;
		}

		public function setAccion2($accion2)
		{
		    $this->accion2 = $accion2;
		}

		public function setRespAccion2($respAccion2)
		{
			$this->respAccion2 = $respAccion2;
		}

		public function setCondicion1($condicion1)
		{
			$this->condicion1 = $condicion1;
		}

		public function setRespCondicion1($respCondicion1)
		{
			$this->respCondicion1 = $respCondicion1;
		}

		public function setCondicion2($condicion2)
		{
			$this->condicion2 = $condicion2;
		}

		public function setRespCondicion2($respCondicion2)
		{
			$this->respCondicion2 = $respCondicion2;
        }
        
        public function setPlanAccion($planAccion)
		{
			$this->planAccion = $planAccion;
        }
        
        public function setPlanCorreccion($planCorreccion)
		{
			$this->planCorreccion = $planCorreccion;
        }
        
        public function setIdUser($idUser)
		{
			$this->idUser = $idUser;
        }
        
        public function setStatus($status)
		{
			$this->status = $status;
		}
   	}
?>
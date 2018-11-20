<?PHP
   	class Evaluacion {
		private $id;
		private $object;
		private $zone;
		private $idTipoRiesgo;
		private $idCausa;		   
		private $atract;
		private $exp;
		private $deb;
		private $idResult;
		private $idPlace;//lugar donde se generará la evaluacion
		private $status;

		public function Evaluacion($id=0, $object="null",$zone="null",$idTipoRiesgo=0,$idCausa=0,$atract=0,
        $exp=0,$deb=0,$idResult=0,$idPlace=0,$status=0)
		{
            $this->setId($id);
            $this->setObject($object);
            $this->setZone($zone);
            $this->setIdTipoRiesgo($idTipoRiesgo);
            $this->setIdCausa($idCausa);
            $this->setAtract($atract);
            $this->setExp($exp);	
            $this->setDeb($deb);  
            $this->setIdResult($idResult);
            $this->setIdPlace($idPlace);
            $this->setStatus($status);
		}

		public function getId()
		{
			return $this->id;
		}

		public function getObject()
		{
			return $this->object;
		}

		public function getZone()
		{
			return $this->zone;
		}

		public function getIdTipoRiesgo()
		{
			return $this->idTipoRiesgo;
		}

		public function getIdCausa()
		{
			return $this->idCausa;
		}

		public function getAtract()
		{
			return $this->atract;
		}

		public function getExp()
		{
			return $this->exp;
		}

		public function getDeb()
		{
			return $this->deb;
		}

		public function getIdResult()
		{
			return $this->idResult;
		}

		public function getIdPlace()
		{
			return $this->idPlace;
		}

		public function getStatus()
		{
			return $this->status;
		}

		public function setId($id)
		{
			$this->id = $id;
		}

		public function setObject($object)
		{
			$this->object = $object;
		}

		public function setZone($zone)
		{
			$this->zone = $zone;
		}

		public function setIdTipoRiesgo($idTipoRegistro)
		{
			$this->idTipoRiesgo = $idTipoRegistro;
		}

		public function setIdCausa($idCausa)
		{
			$this->idCausa = $idCausa;
		}

		public function setAtract($atract)
		{
			$this->atract = $atract;
		}

		public function setExp($exp)
		{
			$this->exp = $exp;
		}

		public function setDeb($deb)
		{
			$this->deb = $deb;
		}

		public function setIdResult($idResult)
		{
			$this->idResult = $idResult;
		}

		public function setIdPlace($idPlace)
		{
			$this->idPlace = $idPlace;
		}

		public function setStatus($status)
		{
			$this->status = $status;
		}
   	}
?>
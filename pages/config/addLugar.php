<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT']."/horizon";
require_once($rootDir . "/private/dao/LugarDao.php");
require_once($rootDir . "/private/dao/CorreosDao.php");
$dominio = $_SERVER['HTTP_HOST']; 


//Agregamos desde BD.PHPy la Entitie Usuario
// desde el Path raiz ==> $rootDir
	
    $name="";
	if(isset($_POST['name'])){
		$name=$_POST['name'];
    }
    $desc="";
	if(isset($_POST['desc'])){
		$desc=$_POST['desc'];
	}
	$movil="";
	if(isset($_POST['movil'])){
		$movil=$_POST['movil'];
	}
	$fijo="";
	if(isset($_POST['fijo'])){
		$fijo=$_POST['fijo'];
	}
	$email="";
	if(isset($_POST['email'])){
		$email=$_POST['email'];
	}
	$web="";
	if(isset($_POST['web'])){
		$web=$_POST['web'];
	}
	$address="";
	if(isset($_POST['address'])){
		$address=$_POST['address'];
    }
    $city="";
	if(isset($_POST['city'])){
		$city=$_POST['city'];
    }
    $province="";
	if(isset($_POST['province'])){
		$province=$_POST['province'];
    }
    $country="";
	if(isset($_POST['country'])){
		$country=$_POST['country'];
    }
    
    $user1="";
	if(isset($_POST['user1'])){
		$user1=$_POST['user1'];
	}
	$user2="";
	if(isset($_POST['user2'])){
		$user2=$_POST['user2'];
	}
	$company="";
	if(isset($_POST['company'])){
		$company=$_POST['company'];
    }
	$estado=1;

	try{
			if(CorreosDao::sqlFound($email) > 0){
				$id=LugarDao::sqladdId();//tomo el id
				$sede = new Lugar($id, $name,$desc,$company,$movil,$fijo,
				$email,$web,$address,$city,$province,$country,$user1,$user2,$estado);
				LugarDao::sqlInsert($sede);
				//enviarMail($email,$cod,$name,$pass);
				?>
					<script>
						alert('Sede registrada exitosamente.');
						window.location.href='lugares?cod=<?php echo $company; ?>';
					</script>
				<?php
			}else{
				CorreosDao::sqlInsert($email);
				$sede = new Lugar($id, $name,$desc,$company,$movil,$fijo,
				$email,$web,$address,$city,$province,$country,$user1,$user2,$estado);
				LugarDao::sqlInsert($sede);
				?>
					<script>
						alert('Sede registrada exitosamente.');
						window.location.href='lugares?cod=<?php echo $company; ?>';
					</script>
				<?php
			}
			
	}catch(Exception $e){
		?>
			<script>
				alert('Ocurrió un error al registrar los datos: <?php echo $e->getMessage(); ?>. Póngase en contacto con su proveedor de software.');
				window.location.href='javascript:history.go(-1);';
			</script>
		<?php
	}

?>
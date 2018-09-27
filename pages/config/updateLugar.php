<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT']."/horizon";
require_once($rootDir . "/private/dao/LugarDao.php");
$dominio = $_SERVER['HTTP_HOST']; 
    $id="";
    if(isset($_POST['id'])){
      $id=$_POST['id'];
    }
    $sede=LugarDao::sqlCargar($id);
    $name="";
	if(isset($_POST['name'])){
        $name=$_POST['name'];
        $sede->setName($name);
	}
    $desc="";
	if(isset($_POST['desc'])){
        $desc=$_POST['desc'];
        $sede->setDesc($desc);
	}
	$movil="";
	if(isset($_POST['movil'])){
        $movil=$_POST['movil'];
        $sede->setPhone1($movil);
	}
	$fijo="";
	if(isset($_POST['fijo'])){
        $fijo=$_POST['fijo'];
        $sede->setPhone2($fijo);
	}
	$email="";
	if(isset($_POST['email'])){
        $email=$_POST['email'];
        $sede->setMail($email);
	}
	$web="";
	if(isset($_POST['web'])){
        $web=$_POST['web'];
        $sede->setWeb($web);
	}
	$address="";
	if(isset($_POST['address'])){
        $address=$_POST['address'];
        $sede->setAddress($address);
    }
    $city="";
	if(isset($_POST['city'])){
        $city=$_POST['city'];
        $sede->setCity($city);
    }
    $province="";
	if(isset($_POST['province'])){
        $province=$_POST['province'];
        $sede->setProvince($province);
    }
    $country="";
	if(isset($_POST['country'])){
        $country=$_POST['country'];
        $sede->setCountry($country);
    }
    
    $user1="";
	if(isset($_POST['user1'])){
        $user1=$_POST['user1'];
        $sede->setCliente($user1);
	}
	$user2="";
	if(isset($_POST['user2'])){
        $user2=$_POST['user2'];
        $sede->setAuditor($user2);
	}
	$company="";
	if(isset($_POST['company'])){
        $company=$_POST['company'];
        $sede->setCompany($company);
    }

	try{
		if(LugarDao::sqlExiste($id) > 0){
			LugarDao::sqlUpdate($sede);
				?>
					<script>
						alert('Registro modificado exitosamente.');
						window.location.href='lugares?cod=<?php echo $company;?>';
					</script>
				<?php
		}else{
            ?>
				<script>
					alert('Ocurrió un error al registrar los datos: El registro no se encuentra disponible.');
					window.location.href='javascript:history.go(-1);';
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
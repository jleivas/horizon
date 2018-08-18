<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT']."/horizon";
require_once($rootDir . "/private/dao/CompanyDao.php");
$dominio = $_SERVER['HTTP_HOST']; 
    $cod="";
    if(isset($_POST['cod'])){
      $cod=$_POST['cod'];
    }
    $company=CompanyDao::sqlCargar($cod);
    $name="";
	if(isset($_POST['name'])){
        $name=$_POST['name'];
        $company->setName($name);
	}
	$user="";
	if(isset($_POST['user'])){
        $user=$_POST['user'];
        $company->setUser($user);
	}
    
	$estado=1;

	try{
		if(CompanyDao::sqlExiste($cod) > 0){
			CompanyDao::sqlUpdate($company);
				?>
					<script>
						alert('Registro modificado exitosamente.');
						window.location.href='empresas';
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
<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT']."/horizon";
require_once($rootDir . "/private/dao/CompanyDao.php");
$dominio = $_SERVER['HTTP_HOST']; 


    $cod="";
    if(isset($_GET['cod'])){
      $cod=$_GET['cod'];
    }
    $company = CompanyDao::sqlCargar($cod);
    $st="0";
	if(isset($_GET['st'])){
        $st=$_GET['st'];
	}
    $company->setStatus($st);
	//inicio encriptad

	//fin encriptado

	try{
		if(CompanyDao::sqlExiste($cod) > 0){
			CompanyDao::sqlUpdate($company);
				?>
					<script>
						alert('Empresa <?php echo $company->getName()?> modificada.');
						window.location.href='empresas';
					</script>
				<?php
		}else{
            ?>
				<script>
					alert('Ocurrió un error al registrar los datos: La empresa no se encuentra registrada.');
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
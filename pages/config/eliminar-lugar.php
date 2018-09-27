<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT']."/horizon";
require_once($rootDir . "/private/dao/LugarDao.php");
$dominio = $_SERVER['HTTP_HOST']; 


    $id="";
    if(isset($_GET['id'])){
      $id=$_GET['id'];
    }
    $sede = LugarDao::sqlCargar($id);
    $st="0";
	if(isset($_GET['st'])){
        $st=$_GET['st'];
	}
    $sede->setStatus($st);
	//inicio encriptad

	//fin encriptado

	try{
		if(LugarDao::sqlExiste($id) > 0){
            LugarDao::sqlUpdate($sede);
                if($st == 0){
				?>
					<script>
						alert('Sede <?php echo $sede->getName()?> eliminada.');
						window.location.href='lugares?cod=<?php echo $sede->getCompany(); ?>';
					</script>
				<?php
                }else{
                    ?>
                        <script>
                            alert('Sede <?php echo $sede->getName()?> restaurada.');
                            window.location.href='lugares?cod=<?php echo $sede->getCompany(); ?>';
                        </script>
                    <?php
                }
		}else{
            ?>
				<script>
					alert('Ocurrió un error al registrar los datos: La sede no se encuentra registrada.');
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
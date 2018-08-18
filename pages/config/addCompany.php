<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT']."/horizon";
require_once($rootDir . "/private/dao/CompanyDao.php");
require_once($rootDir . "/private/dao/UsuarioDao.php");
require_once($rootDir . "/private/dao/CorreosDao.php");
$dominio = $_SERVER['HTTP_HOST']; 


//Agregamos desde BD.PHPy la Entitie Usuario
// desde el Path raiz ==> $rootDir
	$cod="";
	if(isset($_POST['cod'])){
		$cod=$_POST['cod'];
    }
    $name="";
	if(isset($_POST['name'])){
		$name=$_POST['name'];
	}
	$userCod="";
	if(isset($_POST['user'])){
		$userCod=$_POST['user'];
	}
	
	$estado=1;
    $loadUser = UsuarioDao::sqlCargar($userCod);
	try{
		if(CompanyDao::sqlExiste($cod) > 0){
			?>
				<script>
					alert('Ocurrió un error al registrar los datos: El registro ya existe.');
					window.location.href='javascript:history.go(-1);';
				</script>
			<?php
		}else{
			if(CorreosDao::sqlFound($loadUser->getEmail()) > 0){
                
                $company = new Company($cod, $name,$userCod,$estado);
                echo $company->imprimir();
				CompanyDao::sqlInsert($company);
				//enviarMail($email,$cod,$name,$pass);
				?>
					<script>
						alert('Empresa registrada exitosamente.');
						window.location.href='empresas';
					</script>
				<?php
			}else{
				CorreosDao::sqlInsert($email);
				$company = new Company($cod, $name,$userCod,$estado);
				CompanyDao::sqlInsert($company);
				?>
					<script>
						alert('Empresa registrada exitosamente.');
						window.location.href='empresas';
					</script>
				<?php
			}
				
		}
			
	}catch(Exception $e){
		?>
			<script>
				alert('Ocurrió un error al registrar los datos: <?php echo $e->getMessage(); ?>. Póngase en contacto con su proveedor de software.');
				window.location.href='javascript:history.go(-1);';
			</script>
		<?php
	}


function enviarMail($mail,$rut,$name,$companyName)
{
	$para = $mail;
    $titulo = 'Se le ha asignado la empresa '.$companyName;
     
    $mensaje = "<html>".
    "<head>".
    "<style type='text/css'>".
      ".boton_personalizado{".
        "text-decoration: none;".
        "padding: 10px;".
        "font-weight: 600;".
        "font-size: 20px;".
        "color: #ffffff;".
        "background-color: #ff8000;".
        "border-radius: 10px;".
        "border: 2px #0016b0;".
      "}".
       ".boton_personalizado:hover{".
        "color: #ff8000;".
        "background-color: #ffffff;".
      "}".
      ".bloque {".
      "background-color: #fafafa;".
      "margin: 1rem;".
      "padding: 1rem;".
      "text-align: center;".
    "}".
    "</style>".
    "</head>".
    "<body>".
    "<div class='bloque' style='width:100%; height:auto;'>".
    "<font color='Orange' face='verdana'>".
    "<h1>Nuevo usuario registrado</h1>".
    "<img align='center' src='http://www.softdirex.cl/assets/img/softdirex_logo.png'><br>".
    "<br>".
    "</font>".
    "<font face='verdana'>".
      " Estimado/a ".$name.",

    Usted posée una cuenta activa en Horizon y tiene una nueva empresa asignada.<br><br>".
    " <br><br>Ingrese a su cuenta y revise los detalles de su nueva actualización.".
    
    "<font color='Orange' face='verdana'>".
    "<br>".
    "</font>".
    "<a href='https://www.softdirex.cl/entrar.php' class='boton_personalizado'>Iniciar sesión</a><br><br><br>".
      "No responda a este correo electrónico. Para comunicarse con nosotros, haga clic en <a href='www.softdirex.cl/page-contacts.html'>Contacto</a><br><br><br>".
      "<hr>".
      "Si no puedes acceder directamente al enlace,<br>copia el siguiente link y pégalo en la barra de direcciones de tu navegador para finalizar tu registro:<br>".
      "copiar: <b><a href='www.softdirex.cl/entrar.php'>www.softdirex.cl/entrar.php</a></b><br>".
      "<img align='center' src='http://www.softdirex.cl/imgMail/pegar.jpg'><br>".
      "<hr><h6>Copyright 2017 por Softdirex&nbsp;&nbsp;&nbsp;&nbsp;
            <img align='center' src='http://www.softdirex.cl/assets/img/footer-logo.png'>      ".
      "&nbsp;&nbsp;&nbsp;&nbsp;<a href='www.softdirex.cl' color='Orange'><b>Softdirex</b></a>".
    " Un nuevo concepto para tu empresa</h6>".
    "</div>".
    "</body>".
      "</html>";

    $cabeceras = 'MIME-Version: 1.0' . "\r\n";
    $cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $cabeceras .= 'From: Softdirex<no-responder@softdirex.cl>';

      
     
     
    @mail($para, $titulo, $mensaje, $cabeceras);
	
}

?>
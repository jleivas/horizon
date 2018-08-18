<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT']."/horizon";
require_once($rootDir . "/private/dao/UsuarioDao.php");
require_once($rootDir . "/private/dao/CorreosDao.php");
$dominio = $_SERVER['HTTP_HOST']; 


//Agregamos desde BD.PHPy la Entitie Usuario
// desde el Path raiz ==> $rootDir
	$cod="";
	if(isset($_POST['cod'])){
		$cod=$_POST['cod'];
    }
    if (!isset($rootDir)){
        $rootDir = $_SERVER['DOCUMENT_ROOT']."/horizon";
          require_once($rootDir."/private/dao/UsuarioDao.php");
      } 
    $cod="";
    if(isset($_POST['cod'])){
      $cod=$_POST['cod'];
    }
    $user = UsuarioDao::sqlCargar($cod);
    $name="";
	if(isset($_POST['name'])){
        $name=$_POST['name'];
        $user->setName($name);
	}
	$movil="";
	if(isset($_POST['movil'])){
        $movil=$_POST['movil'];
        $user->setPhone1($movil);
	}
	$fijo="";
	if(isset($_POST['fijo'])){
        $fijo=$_POST['fijo'];
        $user->setPhone2($fijo);
	}
	$email="";
	if(isset($_POST['email'])){
        $email=$_POST['email'];
        $user->setMail($email);
	}
	$web="";
	if(isset($_POST['web'])){
        $web=$_POST['web'];
        $user->setWeb($web);
	}
	$address="";
	if(isset($_POST['address'])){
        $address=$_POST['address'];
        $user->setAddress($address);
    }
    $city="";
	if(isset($_POST['city'])){
        $city=$_POST['city'];
        $user->setCity($city);
    }
    $province="";
	if(isset($_POST['province'])){
        $province=$_POST['province'];
        $user->setProvince($province);
    }
    $country="";
	if(isset($_POST['country'])){
        $country=$_POST['country'];
        $user->setCountry($country);
    }
    
	$tipo=5;
	if(isset($_POST['category'])){
        $tipo=$_POST['category'];
        $user->setTipo($tipo);
    }
    
    $avatar="images/faces-clipart/pic-1.png";
	if(isset($_POST['image'])){
        $avatar=$_POST['image'];
        $user->setAvatar($avatar);
    }
    
	$estado=1;

	//inicio encriptad

	//fin encriptado

	try{
		if(UsuarioDao::sqlExiste($cod) > 0){
			if(CorreosDao::sqlFound($email) > 0){
				UsuarioDao::sqlUpdate($user);
				//enviarMail($email,$cod,$name,$pass);
				?>
					<script>
						alert('Usuario modificado exitosamente.');
						window.location.href='usuarios';
					</script>
				<?php
			}else{
				CorreosDao::sqlInsert($email);
				UsuarioDao::sqlUpdate($user);
				?>
					<script>
						alert('Usuario modificado exitosamente.');
						window.location.href='usuarios';
					</script>
				<?php
			}
		}else{
            ?>
				<script>
					alert('Ocurrió un error al registrar los datos: El usuario no se encuentra registrado.');
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


function enviarMail($mail,$rut,$name,$pass)
{
	$para = $mail;
    $titulo = 'Datos actualizados';
     
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

    Su cuenta en Horizon ha sido actualizada exitosamente.<br><br>".
    " <br><br>".
    
    "<font color='Orange' face='verdana'>".
    "<h1>Los datos de acceso son:</h1>".
    "<br>".
    "</font>".
    "Usuario:".$mail."<br>".
    "<a href='https://www.softdirex.cl/entrar.php' class='boton_personalizado'>Iniciar sesión</a><br><br><br>".
      "<br><p><small><b>Le recomendamos cambiar su contraseña.</b></small></p><br><br>".
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
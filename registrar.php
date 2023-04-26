<?php 
use PHPMailer\PHPMailer\PHPMailer;
require 'vendor/autoload.php';
include("con_db.php");

$nombre = trim($_POST['nombre']);
$email=trim($_POST['email']);
$clave_tel_pais = trim($_POST['clave_tel_pais']);
$telefono=trim($_POST['telefono']);
$empresa=trim($_POST['empresa']);
$puesto=trim($_POST['puesto']);
$tipo_empresa=trim($_POST['tipo_empresa']);
$observaciones=trim($_POST['observaciones']);
$servicios=trim($_POST['servicios']);
$stands=trim($_POST['stands']);
$personasXstand=trim($_POST['personasXstand']);

//Consulta para verificar que el usuario no esta registrado

$sql1 = "SELECT * FROM asistentes WHERE email ='$email'" ;
$consultas = mysqli_query($conex, $sql1);

// //Obtener resultados
$consulta = mysqli_fetch_all($consultas);

if(is_null($consulta)){
	if( $servicios=="" && $stands==""){
		$consulta = "INSERT INTO asistentes(nombre, clave_tel_pais, telefono, email, empresa, puesto, tipo_empresa, observaciones,servicios,stands, personas, estado, tipo) VALUES ('$nombre','$clave_tel_pais', '$telefono','$email','$empresa','$puesto', '$tipo_empresa', '$observaciones', '$servicios', '$stands', '$personasXstand', 'Aprobado', 'visitante')";

		$resultado = mysqli_query($conex,$consulta);
		if ($resultado) {
			header("Location: http://localhost:3000/registrado.html");
			//<h3 class="ok">¡Te has inscripto correctamente!</h3>
				
			} else {
				echo "Error: ". $consulta . "<br>" . $conex->error;
			// <h3 class="bad">¡Ups ha ocurrido un error!</h3>
				
			}
		
		EnviarCorreo($email);
	} else {
		$consulta = "INSERT INTO asistentes(nombre, clave_tel_pais, telefono, email, empresa, puesto, tipo_empresa, observaciones,servicios,stands, personas, estado, tipo) VALUES ('$nombre','$clave_tel_pais', '$telefono','$email','$empresa','$puesto', '$tipo_empresa', '$observaciones', '$servicios', '$stands', '$personasXstand', 'Pendiente', 'expositor')";

		$resultado = mysqli_query($conex,$consulta);
		if ($resultado) {
			header("Location: http://localhost:3000/registrado.html");
			//<h3 class="ok">¡Te has inscripto correctamente!</h3>
				
			} else {
				echo "Error: ". $consulta . "<br>" . $conex->error;
			// <h3 class="bad">¡Ups ha ocurrido un error!</h3>
				
			}
	}
} else {
	EnviarCorreo($email);
} 
function EnviarCorreo($email)
{
	$nombre = "Juan Carlos Terrazas Aranda";
	//crear una instancia de PHPmailer.
	$mail = new PHPMailer();
	$mail->isSMTP();
	$mail->Host = 'sandbox.smtp.mailtrap.io';
	$mail->SMTPAuth = true;
	$mail->Port = 2525;
	$mail->Username = '6675e060ec96f6';
	$mail->Password = '310bd45c6e4786';
	$mail->SMTPSecure = 'tls'; // no encriptados pero van por un canal seguro, ssl es para los certificados

	//Configurar contenido del correo
	$mail->setFrom('maquilas@gmail.com'); // quien envia el email
	$mail->addAddress($email);     //receptor
	$mail->Subject = 'Mensaje de Prueba';

	//habilitar HTML
	$mail->isHTML(true);
	$mail->CharSet = 'UTF-8'; //para mostrar acentos y caracteres especiales

	//definir contenido

	$contenido = '<html> <p> Hola ' . $nombre . ' Este es un mensaje de prueba </p></html>';

	$mail->Body = $contenido;
	$mail->AltBody = 'Esto es texto aleternativo sin HMTL';

	if ($mail->send()) {
		echo 'El correo fue enviado correctamente';
	} else {
		echo "El correo no se pudo enviar";
	}
}
?>





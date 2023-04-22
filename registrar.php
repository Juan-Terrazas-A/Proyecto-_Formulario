<?php 

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


//echo $name," ".$email;
if( $servicios=="" && $stands==""){
	$consulta = "INSERT INTO asistentes(nombre, clave_tel_pais, telefono, email, empresa, puesto, tipo_empresa, observaciones,servicios,stands, personas, estado, tipo) VALUES ('$nombre','$clave_tel_pais', '$telefono','$email','$empresa','$puesto', '$tipo_empresa', '$observaciones', '$servicios', '$stands', '$personasXstand', 'Aprobado', 'visitante')";
} else {
	$consulta = "INSERT INTO asistentes(nombre, clave_tel_pais, telefono, email, empresa, puesto, tipo_empresa, observaciones,servicios,stands, personas, estado, tipo) VALUES ('$nombre','$clave_tel_pais', '$telefono','$email','$empresa','$puesto', '$tipo_empresa', '$observaciones', '$servicios', '$stands', '$personasXstand', 'Pendiente', 'expositor')";
}

$resultado = mysqli_query($conex,$consulta);
if ($resultado) {
	header("Location: http://localhost/regMaq/registrado.html");
	//<h3 class="ok">¡Te has inscripto correctamente!</h3>
           
	 } else {
	    echo "Error: ". $consulta . "<br>" . $conex->error;
	// <h3 class="bad">¡Ups ha ocurrido un error!</h3>
           
	 }
    

?>





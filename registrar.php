<?php 

include("con_db.php");

$nombre = trim($_POST['nombre']);
$apellido = trim($_POST['apellido']);
$telefono=trim($_POST['telefono']);
$correo=trim($_POST['correo']);
$compania=trim($_POST['compania']);
$puesto=trim($_POST['puesto']);
$genero=trim($_POST['genero']);
$calle=trim($_POST['calle']);
$colonia=trim($_POST['colonia']);
$numeroInt=trim($_POST['numeroInt']);
$numeroExt=trim($_POST['numeroExt']);
$cp=trim($_POST['cp']);
$ciudad=trim($_POST['ciudad']);

//echo $name," ".$email;

$consulta = "INSERT INTO usuarios(nombre, apellido, telefono, correo, compañia, puesto, genero, calle, colonia, num_interior, num_exterior, codigo_postal, ciudad ) VALUES ('$nombre','$apellido', '$telefono','$correo','$compania','$puesto', '$genero', $calle','$colonia','$numeroInt','$numeroExt','$cp','$ciudad')";

$resultado = mysqli_query($conex,$consulta);
if ($resultado) {
	header("Location: http://localhost/rg/index(1).html");
	mysqli_close($conex);
	//<h3 class="ok">¡Te has inscripto correctamente!</h3>
           
	 } else {
	    echo "Error: ". $consulta . "<br>" . $conex->error;
	// <h3 class="bad">¡Ups ha ocurrido un error!</h3>
           
	 }
    

?>



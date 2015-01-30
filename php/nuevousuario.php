<?php

include('conexion.php');


//Recibir
$usuario = strip_tags($_POST['usuario']);
$pass = strip_tags($_POST['contraseña']);


if (isset($usuario) && !empty($usuario) &&
	isset($pass) && !empty($pass))
{
	$con=mysqli_connect($hostdb, $userdb, $pwdb, $namedb) or die ("problemas al conectar el servidor");
	mysqli_query($con, "INSERT INTO usuarios (usuario,clave) VALUES ('$usuario','$pass')");
	echo "Datos Insertados";
}else{
	echo '<script language="javascript">
	alert("Ocurrio un problema por favor verifique los datos")
	self.location="../pages/login.php"
	</script>';
}


?>
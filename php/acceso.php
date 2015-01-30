<?php
session_start();

// funciones principales
include_once '../libs/ez_sql_core.php';

//funciones para mysqli
include_once '../libs/ez_sql_mysqli.php';

//conexion a la base de datos
include('conexion.php');


//Recibir
$usuario = strip_tags($_POST['usuario']);
$pass = strip_tags($_POST['contraseña']);


if (isset($usuario) && !empty($usuario) &&
	isset($pass) && !empty($pass))
{
	$con=mysqli_connect($hostdb, $userdb, $pwdb, $namedb) or die ("problemas al conectar el servidor");
	$sel=mysqli_query($con, "SELECT usuario,clave FROM usuarios WHERE usuario='$usuario'");
	$sesion=mysqli_fetch_array($sel, MYSQLI_ASSOC);

	if ($pass == $sesion['clave']) 
	{
		$_SESSION['username'] = $usuario;
		//defino la fecha y hora de inicio de sesión en formato aaaa-mm-dd hh:mm:ss
		$_SESSION["ultimoAcceso"]= date("Y-n-j H:i:s"); 

		//registro de evento
		$id = $db->get_row("SELECT id_usuario FROM usuarios WHERE usuario = '$usuario'");
		$db->query("INSERT INTO eventos (tipo_evento, desc_evento , id_usuario) VALUES ( 'Acceso', 'Acceso de usuario', '$id->id_usuario')");
    
		
		//redireccionamiento a la pagina del sistema
		echo '<script language="javascript">window.location.href = "../pages/sistema/admin.php"</script>';
	}
	else 
	{
		echo '<script language="javascript">
		alert("La Combinación de datos introducida no es correcta, Por favor verifique")
		self.location="../pages/login.php"
		</script>';	
	}
}
else 
{		
	echo '<script language="javascript">
	alert("Debes llenar ambos campos, Por favor verifique")
	self.location="../pages/login.php"
	</script>';
}

?>
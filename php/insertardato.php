<?php
//validar sesion
include_once 'validarsesion.php';

// funciones principales
include_once '../libs/ez_sql_core.php';

//funciones para mysqli
include_once '../libs/ez_sql_mysqli.php';

// conexion a la base de datos
include('conexion.php');


//Recibir
$tabla = strip_tags($_POST['tabla']);


if ($tabla == 'rutas') 
{
	$num = strip_tags($_POST['numero']);
	$tipo = strip_tags($_POST['tipo']);
	$nombre = strip_tags($_POST['nombre']);
	$tiempo = strip_tags($_POST['tiempo']);
	$info = strip_tags($_POST['info']);

	if (isset($num) && !empty($num) &&
		isset($tipo) && !empty($tipo) &&
		isset($nombre) && !empty($nombre) &&
		isset($tipo) && !empty($tipo) &&
		isset($info) && !empty($info)) 
	{
		$db->query("INSERT INTO $tabla (numero_ruta, tipo_ruta, nombre_ruta, tiempo_ruta, info_ruta) VALUES ('$num', '$tipo', '$nombre', '$tiempo','$info')");

		//registro de evento
		$id = $db->get_row("SELECT id_usuario FROM usuarios WHERE usuario = '$loged'");
		$id_desc = $db->get_row("SELECT id_ruta FROM $tabla WHERE numero_ruta = $num");
		$db->query("INSERT INTO eventos (tipo_evento, desc_evento , id_usuario) VALUES ( 'Inserción' , 'Datos insertados en tabla: $tabla Ref.Id: $id_desc->id_ruta' , $id->id_usuario)");

		//redireccionamiento
		echo '<script language="javascript">
			alert("Datos Insertados")
			self.location="../pages/sistema/rutas.php"
			</script>';	
	}
	else 
	{
		echo '<script language="javascript">
		alert("Hay un problema con los datos suministrados, porfavor verifique")
		self.location="../pages/sistema/rutas.php"
		</script>';	
	}
}
elseif ($tabla == 'estaciones') 
{
	$num = strip_tags($_POST['numero']);
	$nombre = strip_tags($_POST['nombre']);
	$tipo = strip_tags($_POST['tipo']);
	$servicio = strip_tags($_POST['pertenece']);
	$info = strip_tags($_POST['info']);
	$longitud = strip_tags($_POST['longitud']);
	$latitud = strip_tags($_POST['latitud']);

	if (isset($num) && !empty($num) &&
		isset($nombre) && !empty($nombre) &&
		isset($tipo) && !empty($tipo) &&
		isset($servicio) && !empty($servicio) &&
		isset($info) && !empty($info)) 
	{
		$db->query("INSERT INTO $tabla (numero_estacion, nombre_estacion, tipo_estacion, numero_ruta, info_estacion, longitud_est, latitud_est) VALUES ('$num','$nombre', '$tipo', '$servicio', '$info', '$longitud', '$latitud')");


		//registro de evento
		$id = $db->get_row("SELECT id_usuario FROM usuarios WHERE usuario = '$loged'");
		$id_desc = $db->get_row("SELECT id_estacion FROM $tabla WHERE numero_estacion = $num AND numero_ruta = $servicio ");
		$db->query("INSERT INTO eventos (tipo_evento, desc_evento , id_usuario) VALUES ( 'Inserción' , 'Datos insertados en tabla: $tabla Ref.Id: $id_desc->id_estacion' , $id->id_usuario)");


		//Redireccionamiento
		echo '<script language="javascript">
		alert("Datos Insertados")
		self.location="../pages/sistema/estaciones.php"
		</script>';	

	}
	else
	{
		echo '<script language="javascript">
		alert("Hay un problema con los datos suministrados, porfavor verifique")
		self.location="../pages/sistema/estaciones.php"
		</script>';	
	}
}
elseif ($tabla == 'unidades') 
{
	$num = strip_tags($_POST['numero']);
	$nombre = strip_tags($_POST['nombre']);
	$ruta = strip_tags($_POST['pertenece']);
	$info = strip_tags($_POST['info']);

	if (isset($num) && !empty($num) &&
		isset($nombre) && !empty($nombre) &&
		isset($info) && !empty($info)) 
	{
		$db->query("INSERT INTO $tabla (nombre_unidad, numero_unidad , numero_ruta, info_unidad) VALUES ('$nombre', '$num', '$ruta', '$info')");


		//registro de evento
		$id = $db->get_row("SELECT id_usuario FROM usuarios WHERE usuario = '$loged'");
		$id_desc = $db->get_row("SELECT id_unidad FROM $tabla WHERE numero_unidad = $num");
		$db->query("INSERT INTO eventos (tipo_evento, desc_evento , id_usuario) VALUES ( 'Inserción' , 'Datos insertados en tabla: $tabla Ref.Id: $id_desc->id_unidad' , $id->id_usuario)");


		echo '<script language="javascript">
		alert("Datos Insertados")
		self.location="../pages/sistema/unidades.php"
		</script>';
	}
	else
	{
		echo '<script language="javascript">
		alert("Hay un problema con los datos suministrados, porfavor verifique")
		self.location="../pages/sistema/unidades.php"
		</script>';	
	}
}
elseif ($tabla == 'usuarios') 
{
	$tipo = strip_tags($_POST['tipo']);
	$usuario = strip_tags($_POST['usuario']);
	$clave = strip_tags($_POST['clave']);
	$nombre = strip_tags($_POST['nombre']);
	$email = $db->escape($_POST['email']);//obtener la cadena de caracteres valida para insertar


	if (isset($tipo) && !empty($tipo) &&
		isset($usuario) && !empty($usuario) &&
		isset($clave) && !empty($clave) &&
		isset($nombre) && !empty($nombre) &&
		isset($email) && !empty($email)) 
	{
		$db->query("INSERT INTO $tabla (rol, usuario, clave, nombre_usuario, email) VALUES ('$tipo', '$usuario', '$clave', '$nombre', '$email')");
		echo '<script language="javascript">
			alert("Datos Insertados")
			self.location="../pages/sistema/usuarios.php"
			</script>';
	}
	else 
	{
		echo '<script language="javascript">
		alert("Hay un problema con los datos suministrados, porfavor verifique")
		self.location="../pages/sistema/usuarios.php"
		</script>';	
	}
}
?>
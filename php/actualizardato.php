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
	$id = strip_tags($_POST['id']);
	$num = strip_tags($_POST['numero']);
	$tipo = strip_tags($_POST['tipo']);
	$nombre = strip_tags($_POST['nombre']);
	$tiempo = strip_tags($_POST['tiempo']);
	$info = strip_tags($_POST['info']);

	if (isset($id) && !empty($id) &&
		isset($num) && !empty($num) &&
		isset($tipo) && !empty($tipo) &&
		isset($nombre) && !empty($nombre) &&
		isset($tiempo) && !empty($tiempo) &&
		isset($info) && !empty($info)) 
	{
		$db->query("UPDATE $tabla SET numero_ruta = '$num', tipo_ruta = '$tipo' , nombre_ruta = '$nombre', tiempo_ruta = '$tiempo', info_ruta = '$info' WHERE id_ruta = '$id' ");

		//registro de evento
		$id = $db->get_row("SELECT id_usuario FROM usuarios WHERE usuario = '$loged'");
		$id_desc = $db->get_row("SELECT id_ruta FROM $tabla WHERE numero_ruta = $num");
		$db->query("INSERT INTO eventos (tipo_evento, desc_evento , id_usuario) VALUES ( 'Actualización' , 'Datos actualizados en tabla: $tabla Ref.Id: $id_desc->id_ruta' , $id->id_usuario)");


		echo '<script language="javascript">
			alert("Datos Actualizados")
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
	$id = strip_tags($_POST['id']);
	$num = strip_tags($_POST['numero']);
	$nombre = strip_tags($_POST['nombre']);
	$tipo = strip_tags($_POST['tipo']);
	$servicio = strip_tags($_POST['pertenece']);
	$info = strip_tags($_POST['info']);
	$longitud = strip_tags($_POST['longitud']);
	$latitud = strip_tags($_POST['latitud']);

	if (isset($id) && !empty($id) &&
		isset($num) && !empty($num) &&
		isset($nombre) && !empty($nombre) &&
		isset($tipo) && !empty($tipo) &&
		isset($servicio) && !empty($servicio) &&
		isset($info) && !empty($info)) 
	{
		$db->query("UPDATE $tabla SET numero_estacion = '$num', nombre_estacion = '$nombre', tipo_estacion = '$tipo', numero_ruta = '$servicio', info_estacion = '$info', longitud_est = '$longitud', latitud_est = '$latitud' WHERE id_estacion = '$id' ");
		
		//registro de evento
		$id = $db->get_row("SELECT id_usuario FROM usuarios WHERE usuario = '$loged'");
		$id_desc = $db->get_row("SELECT id_estacion FROM $tabla WHERE numero_estacion = $num AND numero_ruta = $servicio ");
		$db->query("INSERT INTO eventos (tipo_evento, desc_evento , id_usuario) VALUES ( 'Actualización' , 'Datos actualizados en tabla: $tabla Ref.Id: $id_desc->id_estacion' , $id->id_usuario)");


		echo '<script language="javascript">
		alert("Datos Actualizados")
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
	$id = strip_tags($_POST['id']);
	$num = strip_tags($_POST['numero']);
	$nombre = strip_tags($_POST['nombre']);
	$ruta = strip_tags($_POST['pertenece']);
	$info = strip_tags($_POST['info']);

	if (isset($id) && !empty($id) &&
		isset($num) && !empty($num) &&
		isset($nombre) && !empty($nombre) &&
		isset($info) && !empty($info)) 
	{
	$db->query("UPDATE $tabla SET numero_unidad = '$num', nombre_unidad = '$nombre', numero_ruta = '$ruta',  info_unidad = '$info' WHERE id_unidad = '$id' ");


	//registro de evento
	$id = $db->get_row("SELECT id_usuario FROM usuarios WHERE usuario = '$loged'");
	$id_desc = $db->get_row("SELECT id_unidad FROM $tabla WHERE numero_unidad = $num");
	$db->query("INSERT INTO eventos (tipo_evento, desc_evento , id_usuario) VALUES ( 'Actualizacion' , 'Datos actualizados en tabla: $tabla Ref.Id: $id_desc->id_unidad' , $id->id_usuario)");

	echo '<script language="javascript">
		alert("Datos Actualizados")
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
	$id = strip_tags($_POST['id']);
	$tipo = strip_tags($_POST['tipo']);
	$usuario = strip_tags($_POST['usuario']);
	$clave = strip_tags($_POST['clave']);
	$nombre = strip_tags($_POST['nombre']);
	$email = $db->escape($_POST['email']);//obtener la cadena de caracteres valida para el query

	if (isset($id) && !empty($id) &&
		isset($tipo) && !empty($tipo) &&
		isset($usuario) && !empty($usuario) &&
		isset($clave) && !empty($clave) &&
		isset($nombre) && !empty($nombre) &&
		isset($email) && !empty($email)) 
	{
	$db->query("UPDATE $tabla SET rol = '$tipo', usuario = '$usuario', clave = '$clave', nombre_usuario = '$nombre', email = '$email' WHERE id_usuario = '$id' ");
	echo '<script language="javascript">
		alert("Datos Actualizados")
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
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

$tabla = strip_tags($_POST["tabla"]);




if ($tabla == 'rutas') 
{
	$num = strip_tags($_POST["num"]);

	if (isset($num) && !empty($num)) 
	{

	//registro de evento
	$id = $db->get_row("SELECT id_usuario FROM usuarios WHERE usuario = '$loged'");
	$id_desc = $db->get_row("SELECT id_ruta FROM $tabla WHERE numero_ruta = $num");
	$db->query("INSERT INTO eventos (tipo_evento, desc_evento , id_usuario) VALUES ( 'Eliminación' , 'Datos eliminados en tabla: $tabla Ref.Id: $id_desc->id_ruta' , $id->id_usuario)");


	$db->query("DELETE FROM $tabla WHERE numero_ruta = '$num' ");
	$db->query("UPDATE estaciones SET numero_ruta = 0 WHERE numero_ruta = $num");
	$db->query("UPDATE unidades SET numero_ruta = 0 WHERE numero_ruta = $num");
	echo '<script language="javascript">
		alert("Datos Eliminados")
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
	$num = strip_tags($_POST["num"]);

	if (isset($num) && !empty($num)) 
	{

		//registro de evento
		$id = $db->get_row("SELECT id_usuario FROM usuarios WHERE usuario = '$loged'");
		$id_desc = $db->get_row("SELECT id_estacion FROM $tabla WHERE id_estacion = '$num' ");
		$db->query("INSERT INTO eventos (tipo_evento, desc_evento , id_usuario) VALUES ( 'Eliminación' , 'Datos eliminados en tabla: $tabla Ref.Id: $id_desc->id_estacion' , $id->id_usuario)");


		$db->query("DELETE FROM $tabla WHERE id_estacion = '$num' ");
		echo '<script language="javascript">
		alert("Datos Elimminados")
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
	$num = strip_tags($_POST["num"]);

	if (isset($num) && !empty($num)) 
	{
		//registro de evento
		$id = $db->get_row("SELECT id_usuario FROM usuarios WHERE usuario = '$loged'");
		$id_desc = $db->get_row("SELECT id_unidad FROM $tabla WHERE numero_unidad = $num");
		$db->query("INSERT INTO eventos (tipo_evento, desc_evento , id_usuario) VALUES ( 'Actualizacion' , 'Datos actualizados en tabla: $tabla Ref.Id: $id_desc->id_unidad' , $id->id_usuario)");


		$db->query("DELETE FROM $tabla WHERE numero_unidad = '$num' ");
		echo '<script language="javascript">
		alert("Datos Elimminados")
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
	$id = strip_tags($_POST["id"]);

	if (isset($id) && !empty($id)) 
	{
		$db->query("DELETE FROM $tabla WHERE id_usuario = '$id' ");
		echo '<script language="javascript">
		alert("Datos Elimminados")
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
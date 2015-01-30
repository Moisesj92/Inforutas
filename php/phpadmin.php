<?php
//cuenta los datos
$total_rutas = $db->get_var('SELECT count(*) FROM rutas');
$total_estaciones = $db->get_var('SELECT count(*) FROM estaciones');
$total_unidades = $db->get_var('SELECT count(*) FROM unidades');


//unidades sin Asignacion
$unidades0 = $db->get_results('SELECT id_unidad, nombre_unidad FROM unidades WHERE numero_ruta = 0');


//caracteristicas de la ruta


$rutas = $db->get_results('SELECT nombre_ruta, numero_ruta FROM rutas');


//inicializacion y caracteristicas de la ruta
    $servicio = 1;
    $tiempo = $db->get_row("SELECT tiempo_ruta from rutas WHERE numero_ruta = $servicio");
    $ciclo = (($tiempo->tiempo_ruta*2) + 10);
    $estaciones = $db->get_var("SELECT count(*) FROM estaciones WHERE numero_ruta = $servicio ");
    $nombre = $db->get_row("SELECT * FROM rutas WHERE numero_ruta = $servicio ");
    $unidades1 = $db->get_results("SELECT id_unidad, nombre_unidad FROM unidades WHERE numero_ruta = $servicio");
    $intervalo = 10;
    $requerido = round ($ciclo/$intervalo);

if (isset($_POST['servicio']) && !empty($_POST['servicio']))
{
    $servicio = $_POST['servicio'];
    $tiempo = $db->get_row("SELECT tiempo_ruta from rutas WHERE numero_ruta = $servicio");
    $ciclo = (($tiempo->tiempo_ruta*2) + 10);
    $estaciones = $db->get_var("SELECT count(*) FROM estaciones WHERE numero_ruta = $servicio ");
    $nombre = $db->get_row("SELECT * FROM rutas WHERE numero_ruta = $servicio ");
    $unidades1 = $db->get_results("SELECT id_unidad, nombre_unidad FROM unidades WHERE numero_ruta = $servicio");
    if (isset($_POST['intervalo']) && !empty($_POST['intervalo']))
    {
        $intervalo = $_POST['intervalo'];
        $requerido = round ($ciclo/$intervalo); 
    }
    else
    {
        $intervalo = 10;
        $requerido = round ($ciclo/$intervalo);
    }
    
}

//librar unidad
$unidadesasig = $db->get_results("SELECT id_unidad, nombre_unidad FROM unidades WHERE numero_ruta != 0");

if (isset($_POST['liberar']) && !empty($_POST['liberar'])) 
{
    $liberar = $_POST['liberar'];
    $db->query("UPDATE unidades SET numero_ruta = 0 WHERE id_unidad = $liberar" );
    echo '<script language="javascript">
        alert("Liberar Ejecutado")
        self.location="admin.php"
        </script>';

}


//asignar Unidad

if (isset($_POST['asignar1']) && !empty($_POST['asignar1']) &&
    isset($_POST['asignar2']) && !empty($_POST['asignar2']))
{
    $ruta = $_POST['asignar1'];
    $id = $_POST['asignar2'];
    $db->query("UPDATE unidades SET numero_ruta = $ruta WHERE id_unidad = $id");
    echo '<script language="javascript">
        alert("Asignar Ejecutado")
        self.location="admin.php"
        </script>';
}
?>
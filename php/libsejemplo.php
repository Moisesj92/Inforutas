<?php 
// funciones principales

include_once '../libs/ez_sql_core.php';


//funciones para mysql
include_once '../libs/ez_sql_mysqli.php';


//conectar a la base de datos
$db = new ezSQL_mysqli ('root','12345','sistema1','localhost');

// Insertar un dato
$db->query("INSERT INTO usuarios ( usuario , clave) VALUES ('ezsql','1234') ");

//consulta SQL para varios datos
$users = $db->get_results("SELECT usuario, clave FROM usuarios");
//imprimir 
foreach ( $users as $user )
{
            // Access data using object syntax
            echo $user->name;
            echo $user->email;
}


//consulta sql para 1 fila
$user = $db->get_row("SELECT name,email FROM users WHERE id = 2");
//imprimir
echo $user->name;





//consulta de ruta en sentido contrario

$terminales = $db->get_results('SELECT * FROM estaciones WHERE servicio= '.$pag.'  ORDER BY  numero_estacion DESC');

 ?>
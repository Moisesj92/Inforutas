<?php
//inicio de sesión
session_start();

//validar si la sesion existe y asignar a la variable el nombre de usuario

if (isset($_SESSION['username'])) {

	//calculamos el tiempo transcurrido 
    $fechaGuardada = $_SESSION["ultimoAcceso"]; 
    $ahora = date("Y-n-j H:i:s"); 
    $tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada)); 

    //comparamos el tiempo transcurrido 
    if($tiempo_transcurrido >= 600) { 
     //si pasaron 10 minutos o más 
     	session_destroy(); // destruyo la sesión

	    echo '<script language="javascript">
	    alert("Session Cerada por Inactividad")
	    self.location="../login.php"
	    </script>'; //envío al usuario a la pag. de autenticación 
      //sino, actualizo la fecha de la sesión 
    }
    else 
    { 
    $_SESSION["ultimoAcceso"] = $ahora; 
	$loged = $_SESSION['username'];
	}

}
else 
{
    echo '<script language="javascript">
    alert("Acceso denegado")
    self.location="../../index.html"
    </script>';
}

?>
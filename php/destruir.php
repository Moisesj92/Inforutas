<?php
session_start();

session_destroy();
echo '<script language="javascript">
alert("Haz cerrado sesion correctamente")
self.location="../index.html"
</script>';
	
?>
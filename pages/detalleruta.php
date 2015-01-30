<?php 
// funciones principales

include_once '../libs/ez_sql_core.php';

//funciones para mysqli
include_once '../libs/ez_sql_mysqli.php';

//datos de conexion
include_once '../php/conexion.php';

$pag = $_GET["numeroruta"];

$ruta = $db->get_row('SELECT * FROM rutas WHERE numero_ruta= ' .$pag );
$terminales = $db->get_results('SELECT * FROM estaciones WHERE numero_ruta= '.$pag );




?>


<!DOCTYPE html>
<html lang="es">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- <meta charset="UTF-8 / ISO-8859-1"> -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Detalle Servicios</title>
    <link href="../favicon.ico" type="image/x-icon" rel="shortcut icon" />
    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/inforutas.css" rel="stylesheet">
    <link href="../css/detalleruta.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <?php include '../inc/header.php' ; ?>

    <!-- Page Content -->
    <div class="container">

        <!-- Introduction Row -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Ruta <?php echo $ruta->numero_ruta; ?><small>  <?php echo $ruta->nombre_ruta; ?></small></h2>
                <div class="col-lg-9">
                    <p align="justify"><?php echo $ruta->info_ruta; ?></p>
                    <a href="#" class="btn btn-success" role="button">Ver en vivo</a>
                    <a href="servicios.php" class="btn btn-default" role="button">Volver</a>
                </div>
                <div class="col-lg-3">
                    <h4>Horario</h4><p>6:00 am / 8:00 pm</p>
                    <h4>Duración</h4><p><?php echo $ruta->tiempo_ruta; ?> Min</p>
                </div>
            </div> 
        </div>

        
        
        <!-- Rutas Row -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Terminales</h2>
            </div>
        <?php foreach ($terminales as $terminal): ?>
            <div class="col-lg-4 col-sm-6 text-center">
                <img class="img-responsive img-center" src="../img/terminal.png" alt="">
                <h3><?php echo $terminal->nombre_estacion; ?>
                    <small><?php echo $terminal->tipo_estacion; ?>  <?php echo $terminal->numero_estacion; ?></small>
                </h3>
                <p><?php echo $terminal->info_estacion; ?></p>
            </div>
        <?php endforeach ?>
        </div>
        

        <hr>

    <?php include '../inc/footer.php' ; ?>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>

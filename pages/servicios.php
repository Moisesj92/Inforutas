<?php 
// funciones principales

include_once '../libs/ez_sql_core.php';

//funciones para mysqli
include_once '../libs/ez_sql_mysqli.php';

//zebra Pagination
include_once '../libs/zebra_pagination.php';

//datos de conexion
include_once '../php/conexion.php';


$total_rutas = $db->get_var('SELECT count(*) FROM rutas');
$resultados = 2;


$paginacion = new Zebra_Pagination();
$paginacion->records($total_rutas);
$paginacion->records_per_page($resultados);

$rutas = $db->get_results('SELECT * FROM rutas LIMIT ' . (($paginacion->get_page() - 1) * $resultados) . ',' . $resultados);




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

    <title>Servicos</title>
    <link href="../favicon.ico" type="image/x-icon" rel="shortcut icon" />
    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/inforutas.css" rel="stylesheet">
    <link href="../css/servicios.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <?php include_once '../inc/header.php' ; ?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Servicios
                    <small>Rutas - Horarios</small>
                </h2>
            </div>
        </div>
        <!-- /.row -->

        <?php foreach ($rutas as $s): ?>      
        <!-- Project One -->
        <div class="row">
            <div class="col-md-5">
                <a href="detalleruta.php?numeroruta= <?php echo $s->numero_ruta; ?> ">
                    <img class="img-responsive img-center" src="../img/rutas.png" alt="Imagen de ruta">
                </a>
            </div>
            <div class="col-md-7">
                <h3>Ruta <?php echo $s->numero_ruta; ?></h3>
                <h4>Tipo: <?php echo $s->tipo_ruta; ?></h4>
                <h4><?php echo $s->nombre_ruta; ?></h4>
                <p><?php echo $s->info_ruta; ?></p>
                <a class="btn btn-info" href="detalleruta.php?numeroruta= <?php echo $s->numero_ruta; ?> ">Mas Informacion <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
        <hr>
        <!-- /.row -->
        <?php endforeach ?> 

        <!-- Pagination -->
        <div class="row text-center">
            <div class="col-lg-12">
            <?php $paginacion->render(); ?>
            </div>
         </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <?php include_once '../inc/footer.php' ; ?>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>

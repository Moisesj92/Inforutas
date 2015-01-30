<?php 
//validar sesion
include_once '../../php/validarsesion.php';

// funciones principales
include_once '../../libs/ez_sql_core.php';

//funciones para mysqli
include_once '../../libs/ez_sql_mysqli.php';

//datos de conexion
include_once '../../php/conexion.php';


$user = $db->get_row("SELECT * FROM usuarios WHERE usuario = '$loged'");


?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Perfil de Usuario</title>

    <?php include 'inc/headercommon.php'; ?>

</head>

<body>

    <div id="wrapper">

        <?php include 'inc/nav.php' ; ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><span class="fa fa-user"></span>  Perfil de Usuario</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
                <div class="col-lg-6 col-lg-offset-3 ">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3><span class="fa fa-users"></span>     Información de Perfil</h3>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <ul class="list-unstyled list-info">
                                <li>
                                    <span class="icon fa fa-user"></span>
                                    <label>Nombre de usuario: </label>
                                    <?php echo $user->nombre_usuario ?>
                                </li>
                                <li>
                                    <span class="icon fa fa-envelope"></span>
                                    <label>E-meail: </label>
                                    <?php echo $user->email; ?>
                                </li>
                                <li>
                                    <span class="icon fa fa-lock"></span>
                                    <label>Permisos de Usuario: </label>
                                    <?php echo $user->rol; ?>
                                </li>
                            </ul>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>

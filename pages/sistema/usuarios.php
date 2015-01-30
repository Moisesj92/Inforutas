<?php 
//validar sesion
include_once '../../php/validarsesion.php';


// funciones principales
include_once '../../libs/ez_sql_core.php';

//funciones para mysqli
include_once '../../libs/ez_sql_mysqli.php';

//datos de conexion
include_once '../../php/conexion.php';

//acceso solo admin
if (isset($_SESSION['username'])) {

    $loged = $_SESSION['username'];
    $rol = $db->get_row("SELECT rol FROM usuarios WHERE usuario = '$loged' ");
    if ($rol->rol != 'admin')
    {
    echo '<script language="javascript">
    alert("Acceso denegado")
    self.location="admin.php"
    </script>';
    }

}else {
    echo '<script language="javascript">
    alert("Acceso denegado")
    self.location="../../index.html"
    </script>';
}


//consulta de datos
$usuarios = $db->get_results("SELECT * FROM usuarios");



?>





<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administracion usuarios</title>

    <?php include 'inc/headercommon.php'; ?>

</head>

<body>

    <div id="wrapper">

        <?php include 'inc/nav.php' ; ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header"><span class="fa fa-users"></span>     Usuarios</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3><span class="fa fa-list"></span>     Todas los usuarios</h3>
                        </div>
                        <!-- /.panelheading --> 
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Permisos</th>
                                            <th>Usuario</th>
                                            <th>Clave</th>
                                            <th>Nombre</th>
                                            <th>E-mail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($usuarios as $s): ?>
                                        <tr>
                                            <td><?php echo $s->id_usuario; ?></td>
                                            <td><?php echo $s->rol; ?></td>
                                            <td><?php echo $s->usuario; ?></td>
                                            <td><?php echo $s->clave; ?></td>
                                            <td><?php echo $s->nombre_usuario; ?></td>
                                            <td><?php echo $s->email; ?></td>
                                        </tr>
                                        <?php endforeach ?> 
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                </div>
            </div>
            <!-- Crar registro -->
                <div class="row">
                    <div class="col-lg-4">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <h3><span class="fa fa-pencil"></span>     Crear</h3>
                            </div>
                            <div class="panel-body">
                                <form role="form" action="../../php/insertardato.php" method="POST">
                                    <h4>Datos</h4>
                                    <div class="form-group">
                                        <select class="form-control" name="tipo">
                                            <option value="admin">Administrador</option>
                                            <option value="user">Normal</option>
                                        </select>
                                    </div>
                                    <div class="form-group imput-group">
                                        <input class="form-control" placeholder="Usuario" name="usuario" type="text">
                                    </div>
                                    <div class="form-group imput-group">
                                        <input class="form-control" placeholder="Clave" name="clave" type="text">
                                    </div>
                                    <div class="form-group imput-group">
                                        <input class="form-control" placeholder="Nombre Completo" name="nombre" type="text">
                                    </div>
                                    <div class="form-group imput-group">
                                        <input class="form-control" placeholder="E-mail" name="email" type="text">
                                    </div>
                                    <input type="hidden" name="tabla" value="usuarios">
                                    <button type="submit" class="btn btn-outline btn-success">Insertar</button>
                                    <button type="reset" class="btn btn-outline btn-default">Restaurar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- actualizar registro -->
                    <div class="col-lg-4">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <h3><span class="fa fa-arrow-circle-o-up"></span>     Actualizar</h3>
                            </div>
                            <div class="panel-body">
                                <form role="form" action="../../php/actualizardato.php" method="POST">
                                    <h4>ID</h4>
                                    <div class="form-group imput-group">
                                        <input class="form-control" placeholder="ID del Usuario" name="id" type="text">
                                    </div>
                                    <h4>Datos</h4>
                                    <div class="form-group">
                                        <select class="form-control" name="tipo">
                                            <option value="admin">Administrador</option>
                                            <option value="user">Normal</option>
                                        </select>
                                    </div>
                                    <div class="form-group imput-group">
                                        <input class="form-control" placeholder="Usuario" name="usuario" type="text">
                                    </div>
                                    <div class="form-group imput-group">
                                        <input class="form-control" placeholder="Clave" name="clave" type="text">
                                    </div>
                                    <div class="form-group imput-group">
                                        <input class="form-control" placeholder="Nombre Completo" name="nombre" type="text">
                                    </div>
                                    <div class="form-group imput-group">
                                        <input class="form-control" placeholder="E-mail" name="email" type="email">
                                    </div>
                                    <input type="hidden" name="tabla" value="usuarios">
                                    <button type="submit" class="btn btn-outline btn-warning">Actualizar</button>
                                    <button type="reset" class="btn btn-outline btn-default">Restaurar</button>
                                </form>    
                            </div>
                        </div>
                    </div>
                    <!-- Borrar registro -->
                    <div class="col-lg-4">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <h3><span class="fa fa-warning"></span>     Borrar</h3>
                            </div>
                            <div class="panel-body">
                                <form role="form" action="../../php/borrardato.php" method="POST">
                                    <h4>ID del usuario</h4>
                                    <div class="form-group imput-group">
                                        <input class="form-control" placeholder="ID del Usuario" name="id" type="text">
                                    </div>
                                    <input type="hidden" name="tabla" value="usuarios">
                                    <button type="submit" class="btn btn-outline btn-danger">Borrar</button>
                                    <button type="reset" class="btn btn-outline btn-default">Restaurar</button>
                                </form> 
                            </div>
                        </div>
                    </div>
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

    <!-- DataTables JavaScript -->
    <script src="bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

</body>

</html>
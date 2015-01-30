<?php 
//validar sesion
include_once '../../php/validarsesion.php';

// funciones principales
include_once '../../libs/ez_sql_core.php';

//funciones para mysqli
include_once '../../libs/ez_sql_mysqli.php';

//datos de conexion
include_once '../../php/conexion.php';

//consulta de datos
$rutas = $db->get_results("SELECT * FROM rutas");



?>





<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administracion Rutas</title>

    <?php include 'inc/headercommon.php'; ?>

</head>

<body>

    <div id="wrapper">

        <?php include 'inc/nav.php' ; ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header"><span class="fa fa-road"></span>     Rutas</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3><span class="fa fa-list"></span>     Todas las rutas</h3>
                        </div>
                        <!-- /.panelheading --> 
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Numero de Ruta</th>
                                            <th>Tipo ruta</th>
                                            <th>Nombre de la Ruta</th>
                                            <th>Tiempo de la ruta</th>
                                            <th>información de la Ruta</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($rutas as $s): ?>
                                        <tr>
                                            <td><?php echo $s->id_ruta; ?></td>
                                            <td><?php echo $s->numero_ruta; ?></td>
                                            <td><?php echo $s->tipo_ruta; ?></td>
                                            <td><?php echo $s->nombre_ruta; ?></td>
                                            <td><?php echo $s->tiempo_ruta; ?></td>
                                            <td><?php echo $s->info_ruta; ?></td>
                                            
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
                                <form role="form" action="../../php/insertardato.php" method="POST" enctype="multipart/form-data">
                                    <h4>Datos</h4>
                                    <div class="form-group imput-group">
                                        <input class="form-control" placeholder="Numero de ruta" name="numero" type="text">
                                    </div>
                                    <div class="form-group">
                                            <label>Tipo de ruta</label>
                                            <select class="form-control" name="tipo">
                                                <option value="Troncal">Troncal</option>
                                                <option value="Alimentadora">Alimentadora</option>
                                                <option value="Normal">Normal</option>
                                            </select>
                                    </div>
                                    <div class="form-group imput-group">
                                        <input class="form-control" placeholder="Nombre de la ruta" name="nombre" type="text">
                                    </div>
                                    <div class="form-group imput-group">
                                        <input class="form-control" placeholder="Tiempo de ruta" name="tiempo" type="text">
                                    </div>
                                    <div class="form-group imput-group">
                                        <label for="info"> Información de la ruta</label>
                                        <textarea cols="5" rows="10" name="info" class="form-control"></textarea>
                                    </div>
                                    <input type="hidden" name="tabla" value="rutas">
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
                                    <h4>ID de la Ruta</h4>
                                    <div class="form-group imput-group">
                                        <input class="form-control" placeholder="ID Ruta" name="id" type="text">
                                    </div>
                                    <h4>Datos</h4>
                                    <div class="form-group imput-group">
                                        <input class="form-control" placeholder="Numero de ruta" name="numero" type="text">
                                    </div>
                                    <div class="form-group">
                                            <label>Tipo de ruta</label>
                                            <select class="form-control" name="tipo">
                                                <option value="Troncal">Troncal</option>
                                                <option value="Alimentadora">Alimentadora</option>
                                                <option value="Normal">Normal</option>
                                            </select>
                                    </div>
                                    <div class="form-group imput-group">
                                        <input class="form-control" placeholder="Nombre de la ruta" name="nombre" type="text">
                                    </div>
                                      <div class="form-group imput-group">
                                        <input class="form-control" placeholder="Tiempo de ruta" name="tiempo" type="text">
                                    </div>
                                    <div class="form-group imput-group">
                                        <label for="info"> Información de la Ruta</label>
                                        <textarea cols="5" rows="10" name="info" class="form-control"></textarea>
                                    </div>
                                    <input type="hidden" name="tabla" value="rutas">
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
                                    <h4>Numero de la Ruta</h4>
                                    <div class="form-group imput-group">
                                        <input class="form-control" placeholder="Numero de la Ruta" name="num" type="text">
                                    </div>
                                    <input type="hidden" name="tabla" value="rutas">
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
                responsive: true,
                "language": {
                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     "Último",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                }
        });
    });
    </script>

</body>

</html>

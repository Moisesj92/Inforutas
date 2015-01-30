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
$eventos = $db->get_results("SELECT * FROM eventos ORDER BY id_evento DESC");

?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Eventos</title>

    <?php include 'inc/headercommon.php'; ?>

</head>

<body>

    <div id="wrapper">

        <?php include 'inc/nav.php' ; ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header"><span class="fa fa-hdd-o"></span> Eventos</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3><span class="fa fa-list"></span> Todos los eventos</h3>
                        </div>
                        <!-- /.panelheading --> 
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tipo</th>
                                            <th>Descripcción</th>
                                            <th>Fecha/Hora</th>
                                            <th>Usuario</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($eventos as $s): ?>
                                        <tr>
                                            <td><?php echo $s->id_evento; ?></td>
                                            <td><?php echo $s->tipo_evento; ?></td>
                                            <td><?php echo $s->desc_evento; ?></td>
                                            <td><?php echo $s->hora_fecha; ?></td>
                                            <td><?php echo $s->id_usuario; ?></td>
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
                ordering: false,
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
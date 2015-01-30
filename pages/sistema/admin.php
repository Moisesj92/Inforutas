<?php
//validar sesion
include_once '../../php/validarsesion.php';

// funciones principales
include_once '../../libs/ez_sql_core.php';

//funciones para mysqli
include_once '../../libs/ez_sql_mysqli.php';

//datos de conexion
include_once '../../php/conexion.php';

//Funciones php para Admin
include_once '../../php/phpadmin.php';

?>




<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Administracion</title>

    <?php include 'inc/headercommon.php'; ?>

</head>

<body>

    <div id="wrapper">

        <?php include 'inc/nav.php' ; ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Panel Principal</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-road fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $total_rutas ?></div>
                                    <div>Rutas Regitradas</div>
                                </div>
                            </div>
                        </div>
                        <a href="rutas.php">
                            <div class="panel-footer">
                                <span class="pull-left">Ver Detalles</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-code-fork fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $total_estaciones ?></div>
                                    <div>Estaciones Registradas</div>
                                </div>
                            </div>
                        </div>
                        <a href="estaciones.php">
                            <div class="panel-footer">
                                <span class="pull-left">Ver Detalles</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-automobile fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $total_unidades ?></div>
                                    <div>Unidades Registradas</div>
                                </div>
                            </div>
                        </div>
                        <a href="unidades.php">
                            <div class="panel-footer">
                                <span class="pull-left">Ver Detalles</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3><i class="fa fa-road fa-fw"></i> Caracteristicas de la ruta</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4><i class="fa fa-gears"></i> Selecciona la Ruta</h4>
                                        </div>
                                        <div class="panel-body">
                                            <form role="form" action="admin.php" method="POST">
                                                <div class="form-group">
                                                    <select name="servicio" class="form-control">
                                                        <?php foreach ($rutas as $r ): ?>
                                                            <option value="<?php echo $r->numero_ruta ?>"><?php echo $r->nombre_ruta ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-sm pull-right">Consultar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4><i class="fa fa-spinner"></i> Intervalo</h4>
                                        </div>
                                        <div class="panel-body">
                                            <form role="form" action="admin.php" method="POST">
                                                <div class="form-group">
                                                    <select name="servicio" class="form-control">
                                                        <?php foreach ($rutas as $r ): ?>
                                                            <option value="<?php echo $r->numero_ruta ?>"><?php echo $r->nombre_ruta ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                                <div class="form-group input-group">
                                                    <input  class="form-control" placeholder="Intervalo" name="intervalo" type="text"><span class="input-group-addon">Min</span>
                                                </div>
                                                <button type="submit" class="btn btn-default btn-sm pull-right">Calcular</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h3><?php echo $nombre->nombre_ruta ?></h3>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4><i class="fa fa-clock-o"></i> Ruta</h4>
                                        </div>
                                        <div class="panel-body">
                                            <h5 class="pull-right"><?php echo $tiempo->tiempo_ruta ?> <span>Min</span></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4><i class="fa fa-clock-o"></i> Ciclo</h4>
                                            </div>
                                            <div class="panel-body">
                                                <h5 class="pull-right"><?php echo $ciclo ?> <span>Min</span></h5>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-md-4">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4><i class="fa fa-code-fork"></i> Estaciones</h4>
                                            </div>
                                            <div class="panel-body">
                                                <h5 class="pull-right"><?php echo $estaciones ?></h5>
                                            </div>
                                        </div>
                                </div>     
                            </div>        
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            <h4><i class="fa fa-check"></i> Unidades Asignadas</h4>
                                        </div>
                                        <div class="panel-body">
                                            <h4>Ruta : <?php echo $nombre->numero_ruta ?></h4>
                                            <div class="list-group">
                                                <?php foreach ($unidades1 as $u1): ?>
                                                    <a href="unidades.php" class="list-group-item"><i class="fa fa-automobile"></i> Nombre: <span class="pull-rigth"><?php echo $u1->nombre_unidad ?></span></a>
                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                        <div class="panel panel-warning">
                                            <div class="panel-heading">
                                                <h4><i class="fa fa-sliders"></i> Flota Requerida</h4>
                                            </div>
                                            <div class="panel-body">
                                                <h5><strong>Intervalo</strong> = <?php echo $intervalo ?> <span> min</span></h5><hr>
                                                <h5 class="pull-right"><?php echo $requerido ?><span> Unidades</span></h5>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <section>        
                    <div class="col-md-4">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <h4><i class="fa fa-tag"></i> Asignar Unidad</h4>
                            </div>
                            <div class="panel-body">
                                <div class="list-group">
                                    <form role="form" action="admin.php" method="POST">
                                        <div class="form-group">
                                            <h4>Ruta</h4>
                                            <select name="asignar1" class="form-control">
                                                <?php foreach ($rutas as $r ): ?>
                                                    <option value="<?php echo $r->numero_ruta ?>"><?php echo $r->nombre_ruta ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>    
                                        <div class="form-group">
                                            <h4>Unidad</h4>
                                            <select name="asignar2" class="form-control">
                                                <?php foreach ($unidades0 as $u ): ?>
                                                    <option value="<?php echo $u->id_unidad ?>"><?php echo $u->nombre_unidad ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    <button type="submit" class="btn btn-success btn-sm pull-right">Asignar</button>  
                                    </form> 
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section>        
                    <div class="col-md-4">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <h4><i class="fa fa-unlink"></i> Liberar Unidad</h4>
                            </div>
                            <div class="panel-body">
                                <div class="list-group">
                                    <form role="form" action="admin.php" method="POST">
                                        <div class="form-group">
                                            <h4>Unidad</h4>
                                            <select name="liberar" class="form-control">
                                                <?php foreach ($unidadesasig as $usig ): ?>
                                                    <option value="<?php echo $usig->id_unidad ?>"><?php echo $usig->nombre_unidad ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    <button type="submit" class="btn btn-warning btn-sm pull-right">Liberar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section> 
                <section>        
                    <div class="col-md-4">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <h4><i class="fa fa-times"></i> Unidades Sin Asignar</h4>
                            </div>
                            <div class="panel-body">
                                <div class="list-group">
                                    <?php foreach ($unidades0 as $u0): ?>
                                        <a href="unidades.php" class="list-group-item"><i class="fa fa-automobile"></i> Nombre: <span class="pull-rigth"><?php echo $u0->nombre_unidad ?></span></a>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>  
            </div>        
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <?php include 'inc/footercommon.php' ; ?>

</body>

</html>

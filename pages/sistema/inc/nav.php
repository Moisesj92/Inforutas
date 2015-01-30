<!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="admin.php">Administración</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <span><?php echo $loged ?></span> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="profile.php"><i class="fa fa-user fa-fw"></i> Perfil de usuario</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="../../php/destruir.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>

            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="admin.php"><i class="fa fa-dashboard fa-fw"></i> Panel Principal</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Datos de servicios<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                 <li>
                                    <a href="rutas.php"><i class="fa fa-road fa-fw"></i> Rutas</a>
                                </li>
                                <li>
                                    <a href="estaciones.php"><i class="fa fa-code-fork fa-fw"></i> Estaciones</a>
                                </li>
                                <li>
                                    <a href="unidades.php"><i class="fa fa-automobile fa-fw"></i> Unidades</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                                                <li>
                            <a href="#"><i class="fa fa-terminal fa-fw"></i> Configuraciones del Sistema<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                 <li>
                                    <a href="eventos.php"><i class="fa fa-hdd-o fa-fw"></i> Eventos</a>
                                </li>
                                <li>
                                    <a href="usuarios.php"><i class="fa fa-users fa-fw"></i> Usuarios</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
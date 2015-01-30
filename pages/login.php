<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8 / ISO-8859-1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Acceso</title>
    <link href="../favicon.ico" type="image/x-icon" rel="shortcut icon" />

    <!-- Bootstrap Core CSS -->
   <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
   <link href="../css/inforutas.css" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h2>Acceso al sistema</h2>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="../php/acceso.php" method="POST">
                                <div class="input-group mb15">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-user">    
                                        </i>
                                    </span>
                                    <input class="form-control" placeholder="Usuario" name="usuario" type="text" autofocus>
                                </div>
                                <div class="input-group mb15">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-lock">
                                        </i>
                                    </span>
                                    <input class="form-control" placeholder="Password" name="contraseña" type="password" value="">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-lg btn-block btn-success">Entrar</button>
                                <a class="btn btn-lg btn-block btn-danger" href="../index.html" role="button">Volver</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../js/sb-admin-2.js"></script>

</body>

</html>
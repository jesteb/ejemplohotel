
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="./img/favicon.ico">
    <title>Hotel Valdegastea. Reserva ahora</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/css.css" rel="stylesheet">  
    </head>
<!-- NAVBAR
================================================== -->

<body>
<br><br><br><br>
<div class="container">
    <div class="row">

        <div class="col-md-12 center login-header">
        <div class="well   login-box">
         <h1>Reservas hotel</h1>


            <div class="alert alert-info">

                <ul>
                     <li>Introduca la contraseña de administrador si quiere configurar habitaciones, dar de alta clientes, gestionar tarifas y ver o cancelar reservas .<br></li>
                
                     <li>Introduzca el usuario y contraseña dado por el administrador del hotel para poder realizar reservas<br></li>
                </ul>
                   

            </div>

            <form class="form-horizontal" action="includes/checklogin.php" method="post">

                <fieldset>

                    <div class="input-group input-group-lg">

                        <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>

                        <input type="text" class="form-control" placeholder="Correo electronico" id="login" name="login">

                    </div>

                    <div class="clearfix"></div><br>


                    <div class="input-group input-group-lg">

                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>

                        <input type="password" class="form-control" placeholder="Contraseña" id="password" name="password">

                    </div>
                    <br>
                      <button type="submit" class="basic botton_small   btn btn-primary  ">Entrar</button>

                </fieldset>
            </form>
</div><!--/fluid-row-->
</div><!--/.fluid-container-->

<!-- external javascript -->
  </body> 
  <?php include( "./includes/script.php") ?>
 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</html>
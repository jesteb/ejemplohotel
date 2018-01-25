<?php
//include ('phpmailer.php');
require_once ('includes/sesion.php');
include ('includes/bases.php');
  require_once('./includes/class.phpmailer.php');
  require_once("./includes/class.smtp.php");


 if(isset($_GET['pagina'])){
  $pagina =  $_GET['pagina'];
 }else{
    $pagina ='';
 }
  if(isset($_GET['accion'])){
  $accion =  $_GET['accion'];
 }else{
    $accion ='';
 }
 if(isset($_GET['detalles'])){
  $detalles =  $_GET['detalles'];
 }else{
    $detalles ='';
 }
if(isset($_GET['id'])){
  $id =  $_GET['id'];
 }

 include("./includes/envios.php");
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Reserva de hoteles</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
    <meta name="author" content="Jesus Esteban">
    <!-- The styles -->
    <link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet">
    <link href="css/charisma-app.css" rel="stylesheet"> 
    <link rel="stylesheet" href="./css/css.css">   
     <link rel="stylesheet" href="./css/jquery.dataTables.min.css">
    <link rel="shortcut icon" href="img/favicon.ico">

</head>
<header>
       <?php include ('includes/header.php'); ?>
</header>
<body> 
   <?php include ('includes/nadvar_left.php'); ?>
<div class="ch-container">
    <div class="row">

        <div id="content" class="col-lg-10 col-sm-10">
        <?php
        if($pagina != ''){
          if($accion != ''){
                include ('modulos/'.$pagina.'/accion.php');
            }

          if($detalles != ''){
                include ('modulos/'.$pagina.'/detalles.php');
            }

          if (($accion == '') && ($detalles == '')) {
            include ('modulos/'.$pagina.'/index.php');   
          }

       }else{

        include ('modulos/reservasclientes/index.php');
       }
      
        ?>

       </div>

    <!--/span-->



    </div><!--/row-->

 </div>
 <footer class="row">

    </footer>

</div><!--/.fluid-container-->

<?php
include ('includes/script.php');
?>
<script type="text/javascript" src="./js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
   $('#tabla').DataTable();
  });
</script>
<script src="js/jquery.cookie.js"></script>
<script src="js/jquery.noty.js"></script>
<script src="js/jquery.raty.min.js"></script>
<script src="js/jquery.iphone.toggle.js"></script>
<script src="js/jquery.autogrow-textarea.js"></script>
<script src="js/jquery.uploadify-3.1.min.js"></script>
<script src="js/jquery.history.js"></script>


</body>

</html>


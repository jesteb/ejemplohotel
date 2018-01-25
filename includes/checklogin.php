<?php
include ('bases.php');
$login =  $_POST['login'];
$password =  md5 ($_POST['password']);
 $sql= sprintf("SELECT * FROM clientes WHERE email='%s' and password='%s'",$login,$password);
$result=mysql_query($sql);
$count = mysql_num_rows($result);
// If result matched $username and $password
echo $result;
echo $count;

if($count == 1){

 session_start();
 $sql_array = mysql_fetch_array($result);
 $_SESSION['username'] = $sql_array['nombre'];
 $_SESSION['rol'] = $sql_array['rol'];
 $_SESSION['id_usuario'] = $sql_array['dni'];

header ('Location: ../index.php');
}
 else {
 	header ('Location: ../login.php');
}
?>

 
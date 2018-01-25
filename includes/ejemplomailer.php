<?php

include_once('./includes/class.phpmailer.php');
include_once('./includes/class.smtp.php');

//Este bloque es importante
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Host = "smtp.gmail.com";
$mail->Port = 465;
 
//Nuestra cuenta
$mail->Username ='prof.jeb.oja@gmail.com';
$mail->Password = 'xxxxx'; //Su password
 
//Agregar destinatario
$mail->AddAddress('jesteb@gmail.com');
$mail->Subject = "Mail PRueba";
$mail->Body = "Mail PRueba";

//Avisar si fue enviado o no y dirigir al index
if($mail->Send())
{
  echo 'enviado';
}
else{
 echo 'No enviado';
}
?>
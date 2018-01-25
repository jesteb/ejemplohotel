<?PHP try {
  $mail = new PHPMailer(true); //Nueva instancia, con las excepciones habilitadas
  $mail->IsSMTP();                           // Usamos el metodo SMTP de la clase PHPMailer
  $mail->SMTPAuth   = true;                  // habilitado SMTP autentificación
  $mail->Port       = 465;                    // puerto del server SMTP
  $mail->Host       = "smtp.gmail.com"; // SMTP server
  $mail->Username   = "enriquehormillaaragon@gmail.com";     // SMTP server Usuario
  $mail->Password   = "";            // SMTP server password
  $mail->From       = "enriquehormillaaragon@gmail.com"; //Remitente de Correo
  $mail->FromName   = "Enrique"; //Nombre del remitente
  $to = "qiqe_alberite@hotmail.com"; //Para quien se le va enviar
  $mail->AddAddress($to);
  $mail->Subject  = "Mi primer mensaje con aaaPhpMailer"; //Asunto del correo
    $body             = '<p>Este es un Mensaje de Prueba</p>';
  $body             = preg_replace('/\\\\/','', $body); //Escapar backslashes
  $mail->MsgHTML($body);
  $mail->IsHTML(true); // Enviar como HTML
  $mail->Send();//Enviar
  echo 'El Mensaje a sido enviado.';
} catch (phpmailerException $e) {
  echo $e->errorMessage();//Mensaje de error si se produciera.
}
?>
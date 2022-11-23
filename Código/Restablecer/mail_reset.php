<?php
// Varios destinatarios
$para  = $correo . ', '; // atención a la coma
//$para .= 'wez@example.com';

// título
$título = 'Restablecer contraseña';
$codigo = rand(1000,9999);

// mensaje
$mensaje = '
<html>
<head>
  <title>Restablecer</title>
</head>
<body>
  <h1>Cotton & Co Sweaters</h1>
  <div style="text-aling:center; background-color:#ccc">
    <p>Restablecer contraseña</p>
    <h3>'.$codigo.'</h3>
    <!--Cambiar por el dominio al momento de subir al host-->
    <p><a href="http://localhost/Cotton_-_Co_Sweaters/Código/Restablecer/reset.php?correo='.$correo.'&token='.$token.'">Para restablecer da Click Aqui</a></p>
    <p><small>Si usted no solicitó un cambio de contraseña, favor omitir este correo</small></p>
  </div>
</body>
</html>
';

// Para enviar un correo HTML, debe establecerse la cabecera Content-type
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
/*
// Cabeceras adicionales
$cabeceras .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
$cabeceras .= 'From: Recordatorio <cumples@example.com>' . "\r\n";
$cabeceras .= 'Cc: birthdayarchive@example.com' . "\r\n";
$cabeceras .= 'Bcc: birthdaycheck@example.com' . "\r\n";
*/

// Enviarlo
$enviado = false;
if(mail($para, $título, $mensaje, $cabeceras)){
  $enviado = true; //Para asegurarse de que se haya enviado el correo
}
?>
<?php

    include "../DB/db.php";
    $correo = $_POST['correo'];
    $token = random_bytes(5); //Para generar el token
    include "mail_reset.php"; //Para enviar el correo
     
    if($enviado){
        $DB->query("insert into passwords(correo, token, codigo) 
        values('$correo','$token','$codigo')") or die($DB->error);
        echo '<p>Verifica tu correo para restablecer la contraseña';
    }

    


?>

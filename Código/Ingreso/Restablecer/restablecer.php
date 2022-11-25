<?php

    include "../../DB/db.php";
    $correo = $_POST['correo'];
    $bytes = random_bytes(5);
    $token = bin2hex($bytes); //Para generar el token
    include "mail_reset.php"; //Para enviar el correo
     
    if($enviado){
        $DB->query("insert into passwords(correo, token, codigo) 
        values('$correo','$token','$codigo')") or die($DB->error);
        echo "<script>alert('Verifica tu correo para restablecer tu contraseña');window.location='../index.php'</script>";
    }

    


?>

<?php
    error_reporting(0);
    include "../../DB/db.php";
    $correo = $_POST['correo'];
    $bytes = random_bytes(5);
    $token = bin2hex($bytes); //Para generar el token
    include "mail_reset.php"; //Para enviar el correo
     
    if($enviado){
        $DB->query("insert into recuperar_password(correo, token, codigo) 
        values('$correo','$token','$codigo')") or die($DB->error);
        echo "
                    .
                    <html>
                        <script src='https://unpkg.com/sweetalert2@9.5.3/dist/sweetalert2.all.min.js'></script>
                    <html>
                    <script>
                        Swal
                            .fire({
                                title: 'Ha ocurrido un error',
                                text: 'Por favor verifique su información',
                                icon: 'error',
                                confirmButtonText: 'Continuar'
                            })
                            .then(resultado => {
                                if (resultado.value) {
                                    window.location='index.php';
                                }else {    
                                }
                            });
                    </script>;window.location='../index.php'</script>";
    }

    


?>

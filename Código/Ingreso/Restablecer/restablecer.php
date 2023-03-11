<?php
    //error_reporting(0);
    include "../../DB/db.php";
    $correo = $_POST['correo'];
    $bytes = random_bytes(5);
    $token = bin2hex($bytes); //Para generar el token
    include "mail_reset.php"; //Para enviar el correo
    
    $query_per = mysqli_fetch_array(mysqli_query($DB, "SELECT * FROM recuperar_password WHERE correo = '$correo'"));
    
    $id_persona = $query_per['id_persona'];
    date_default_timezone_set('America/Bogota');
    $fecHr = date('Y-m-d H:i:s');
    if($enviado){
        $query_usu = "INSERT INTO recuperar_password(correo, token, codigo, fecha, id_persona) values('$correo','$token','$codigo','$fecHr', '$id_persona')";
        $DB->query($query_usu);
        echo "
                    .
                    <html>
                        <script src='https://unpkg.com/sweetalert2@9.5.3/dist/sweetalert2.all.min.js'></script>
                    <html>
                    <script>
                        Swal
                            .fire({
                                title: 'Correo enviado',
                                text: 'Revise su correo para recuperar su contraseña',
                                icon: 'success',
                                confirmButtonText: 'Continuar'
                            })
                            .then(resultado => {
                                if (resultado.value) {
                                    window.location='../index.php';
                                }else {    
                                }
                            });
                    </script>";
    }

    


?>

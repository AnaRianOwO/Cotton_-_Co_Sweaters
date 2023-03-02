<?php

    include "../../DB/db.php";
    $correo = $_POST['correo'];
    $p1 = $_POST['p1'];
    $p2 = $_POST['p2'];

    if($p1 == $p2){
        $p1 = password_hash($p1, PASSWORD_DEFAULT);
        $DB -> query("UPDATE persona SET pass = '$p1' WHERE correo = '$correo'") or die($DB -> error);
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
    }else{
        echo "Las contraseñas no coinciden";
    }

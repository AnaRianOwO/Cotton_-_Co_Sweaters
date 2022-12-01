<?php
    
    include("../DB/db.php");
    
    //Registrar usuario
    if(isset($_POST['btn_registrar'])){

        $idUsuario = mysqli_real_escape_string($DB, $_POST['idUsuario']);
        $docType = mysqli_real_escape_string($DB, $_POST['docType']);
        $name = mysqli_real_escape_string($DB, $_POST['name']);
        $secondName = mysqli_real_escape_string($DB, $_POST['secondName']);
        $surname = mysqli_real_escape_string($DB, $_POST['surname']);
        $secondSurname = mysqli_real_escape_string($DB, $_POST['secondSurname']);
        $indicativo = mysqli_real_escape_string($DB, $_POST['indicativo']);
        $phone = mysqli_real_escape_string($DB, $_POST['phone']);
        $correo = mysqli_real_escape_string($DB, $_POST['correo']);
        $direccion = mysqli_real_escape_string($DB, $_POST['direccion']);
        $pass = mysqli_real_escape_string($DB, $_POST['pass']);
        $idCiudad = mysqli_real_escape_string($DB, $_POST['idCiudad']);
        $pass_cifrada = password_hash($pass, PASSWORD_DEFAULT);
        $sql_user = "SELECT idUsuario, docType FROM usuario WHERE idUsuario = '$idUsuario' and docType  = '$docType'";
        $resultado_user = $DB->query($sql_user);
        $filas = $resultado_user->num_rows;
        if ($filas > 0) {
            echo "
                .
                <html>
                    <script src='https://unpkg.com/sweetalert2@9.5.3/dist/sweetalert2.all.min.js'></script>
                <html>
                <script>
                    Swal
                        .fire({
                            title: 'El usuario ya existe',
                            text: 'Porfavor verifique su información',
                            icon: 'warning',
                            confirmButtonText: 'Continuar'
                        })
                        .then(resultado => {
                            if (resultado.value) {
                                window.location='index.php';
                            }else {    
                            }
                        });
                </script>";
        }else{
            $query_usuario = "INSERT INTO usuario VALUES 
            ('$idUsuario','$docType','$name','$secondName','$surname','$secondSurname',
            '$indicativo','$phone','$correo','$direccion','$pass_cifrada','','$idCiudad','1')";

            $resultado_usuario = $DB->query($query_usuario);
            if($resultado_usuario > 0){
                echo "
                    .
                    <html>
                        <script src='https://unpkg.com/sweetalert2@9.5.3/dist/sweetalert2.all.min.js'></script>
                    <html>
                    <script>
                        Swal
                            .fire({
                                title: 'Usuario registrado correctamente',
                                icon: 'success',
                                confirmButtonText: 'Continuar'
                            })
                            .then(resultado => {
                                if (resultado.value) {
                                    window.location='index.php';
                                }else {    
                                }
                            });
                    </script>";
            }else{
                echo "
                    .
                    <html>
                        <script src='https://unpkg.com/sweetalert2@9.5.3/dist/sweetalert2.all.min.js'></script>
                    <html>
                    <script>
                        Swal
                            .fire({
                                title: 'Ha ocurrido un error',
                                text: 'Porfavor verifique su información',
                                icon: 'error',
                                confirmButtonText: 'Continuar'
                            })
                            .then(resultado => {
                                if (resultado.value) {
                                    window.location='index.php';
                                }else {    
                                }
                            });
                    </script>";
                    // echo "Error: ".$query."<br>".mysqli_error($DB);
            }
        }
    }
?>
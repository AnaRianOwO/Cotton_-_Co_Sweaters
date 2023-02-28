<?php
    error_reporting(0);
    include("../DB/db.php");
    
    //Registrar usuario
    if(isset($_POST['btn_registrar'])){

        $id_persona = mysqli_real_escape_string($DB, $_POST['idUsuario']);
        $docType = mysqli_real_escape_string($DB, $_POST['docType']);
        $name = mysqli_real_escape_string($DB, $_POST['Name']);
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
        $sql_user = "SELECT id_persona, docType FROM persona WHERE id_persona = '$idUsuario' and docType  = '$docType'";
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
            $sumar = mysqli_query($DB ,"SELECT * FROM usuario ORDER BY CAST(REPLACE(idUsuario,'U','') as int) DESC LIMIT 1");
            $rows = mysqli_num_rows($sumar);
            if($rows > 0){
                $index = 1;
            }else{
                $usuario = mysqli_fetch_assoc($sumar);
                $indice = substr($usuario['idUsuario'], 1);
                $indice = intval($indice);
                $indice+=1;
            }

            $query_persona = "INSERT INTO persona VALUES 
            ('$id_persona','$docType','$name','$secondName','$surname','$secondSurname',
            '$indicativo','$phone','$correo','$pass_cifrada','1','$idCiudad')";

            $query_usuario = "INSERT INTO usuario VALUES ('U$indice','$direccion','$id_persona')";
            

            $resultado_persona = $DB->query($query_persona);
            $DB->query($query_usuario);
            if($resultado_persona > 0){
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
                                    window.location='../Ingreso/index.php';
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
                    </script>";
                    // echo "Error: ".$query."<br>".mysqli_error($DB);
            }
        }
    }
?>
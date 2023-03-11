<?php
require_once ("../../../../DB/db.php");

if(isset($_POST)){
  if (strlen($_POST['id_persona']) >=1 && strlen($_POST['docType'])  >=1 && strlen($_POST['firstName'])  >=1 
  && strlen($_POST['secondName'])  >=1 && strlen($_POST['surname']) >= 1 && strlen($_POST['secondSurname']) >= 1 
  && strlen($_POST['indicativo']) >= 1 && strlen($_POST['phone']) >= 1 && strlen($_POST['correo']) >= 1 
  && strlen($_POST['pass']) >= 1 && strlen($_POST['idCiudad']) >= 1) {

    $id_persona = trim($_POST['id_persona']);
    $docType = trim($_POST['docType']);
    $firstName = trim($_POST['firstName']);
    $secondName = trim($_POST['secondName']);
    $surname = trim($_POST['surname']);
    $secondSurname = trim($_POST['secondSurname']);
    $indicativo = trim($_POST['indicativo']);
    $phone = trim($_POST['phone']);
    $correo = trim($_POST['correo']);
    $pass = trim($_POST['pass']);
    $idCiudad = trim($_POST['idCiudad']);
    $pass_cifrada = password_hash($pass, PASSWORD_DEFAULT);
    $sql_user = "SELECT id_persona, docType FROM persona WHERE id_persona = '$id_persona' AND docType  = '$docType' OR correo = '$correo'";
        $resultado_user = $DB->query($sql_user);
        $filas = $resultado_user->num_rows;
        echo $filas;
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
                                window.location='../administrador.php';
                            }else {    
                            }
                        });
                </script>";
        }else{
            $sumar = mysqli_query($DB ,"SELECT * FROM administrador ORDER BY CAST(REPLACE(id_persona,'A','') as int) DESC LIMIT 1");
            $rows = mysqli_num_rows($sumar);
            if(!isset($rows)){
                $index = 1;
            }else{
                $admin = mysqli_fetch_assoc($sumar);
                // $indice = substr($admin['id_persona'], 1);
                // $indice = intval($indice);
                // $indice+=1;
            }

            $query_persona = "INSERT INTO persona VALUES 
            ('$id_persona','$docType','$firstName','$secondName','$surname','$secondSurname',
            '$indicativo','$phone','$correo','$pass_cifrada','1','$idCiudad')";

            $query_admin = "INSERT INTO administrador VALUES ('$id_persona','$docType')";
            

            $resultado_persona = $DB->query($query_persona);
            $DB->query($query_admin);
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
                                    window.location='../administrador.php';
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
                                    window.location='../administrador.php';
                                }else {    
                                }
                            });
                    </script>";
                    // echo "Error: ".$query."<br>".mysqli_error($DB);
            }
        }
  }
}









?>
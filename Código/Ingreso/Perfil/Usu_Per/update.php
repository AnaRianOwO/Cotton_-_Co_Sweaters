<?php
require_once ("../../../DB/db.php");
session_start();
$idUsuario = $_SESSION['idUsuario'];
$docType = $_SESSION['docType'];

// $consulta = mysqli_query($DB,"SELECT * FROM persona P INNER JOIN usuario U ON U.id_persona = P.id_persona AND U.docType = P.docType WHERE P.correo = '$idUsuario' AND P.docType = '$docType'");
if(isset($_POST["btnActivar"])){
    $firstName = $_POST['firstName'];
    $secondName = $_POST['secondName'];
    $surname = $_POST['surname'];
    $secondSurname = $_POST['secondSurname'];
    $correo = $_POST['correo'];
    $indicativo = $_POST['indicativo'];
    $phone = $_POST['phone'];
    $direccion = $_POST['direccion'];
    $ciudad = $_POST['ciudad'];
    
    $update = mysqli_query($DB,"UPDATE persona set firstName = '$firstName',secondName = '$secondName',surname = '$surname',secondSurname = '$secondSurname',indicativo='$indicativo',phone = '$phone',correo='$correo',idCiudad='$ciudad' WHERE id_persona = '$idUsuario' AND docType = '$docType'");
    $update2 = mysqli_query($DB,"UPDATE usuario set direccion = '$direccion' WHERE id_persona = '$idUsuario' AND docType = '$docType'");
    
    if($update and $update2){
        header('Location: index.php');
    }else{
        echo "Ha ocurrido un error";
    }
}
if(isset($_POST['btnEliminar'])){
    echo "
        .
        <html>
            <script src='https://unpkg.com/sweetalert2@9.5.3/dist/sweetalert2.all.min.js'></script>
        <html>
        <script>
            Swal
                .fire({
                    title: '¿Estas seguro?',
                    text: 'Si borras tu cuenta perderas todos tus registros',
                    icon: 'warning',
                    confirmButtonText: 'Continuar',
                    showCancelButton: true,
                    cancelButtonText: 'Cancelar'
                })
                .then(resultado => {
                    if (resultado.value) {
                        window.location='validacion.php';
                    }else {   
                        window.location='index.php'; 
                    }
                });
        </script>";
        // $update = mysqli_query($DB,"UPDATE `persona` SET `idEstado` = '0' WHERE `persona`.`id_persona` = '$idUsuario' AND `persona`.`docType` = '$docType'");
        // if($update){
        //     header('Location: index.php');
        // }else{
        //     echo "<script>alert('Ha ocurrido un error');</script>";
        // }
}
?>
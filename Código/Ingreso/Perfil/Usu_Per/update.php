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
?>
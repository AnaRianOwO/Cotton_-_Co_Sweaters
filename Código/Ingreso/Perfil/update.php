<?php
include('../../DB/db.php');

session_start();

$idUsuario = $_SESSION['idUsuario'];
$firstName=$_POST['firstName'];
$secondName = $_POST['secondName'];
$surname = $_POST['surname'];
$secondSurname = $_POST['secondSurname'];
$indicativo = $_POST['indicativo'];
$phone = $_POST['phone'];
$correo = $_POST['correo'];
$direccion = $_POST['direccion'];
$idCiudad = $_POST['idCiudad'];


$sql="UPDATE usuario SET idUsuario='$idUsuario', firstName='$firstName',secondName='$secondName',surname='$surname', secondSurname='$secondSurname',indicativo='$indicativo',phone='$phone',direccion='$direccion',idCiudad='$idCiudad' WHERE idUsuario='$idUsuario'";

$query=mysqli_query($DB,$sql);

    if($query){
        echo "<script>alert('Datos cambiados exitosamen');window.location='Usu_Per/index.php'</script>";
    }
?>
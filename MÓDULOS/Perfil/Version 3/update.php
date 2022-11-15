<?php

include("conexion.php");



$id = "2314213";
$docType = $_POST['docType'];
$firstName=$_POST['firstName'];
$secondName = $_POST['secondName'];
$surname = $_POST['surname'];
$secondSurname = $_POST['secondSurname'];
$indicativo = $_POST['indicativo'];
$phone = $_POST['phone'];
$correo = $_POST['correo'];
$direccion = $_POST['direccion'];
$pass = $_POST['pass'];
$idCiudad = $_POST['idCiudad'];


$sql="UPDATE usuario SET firstName='$firstName',secondName='$secondName',surname='$surname',secondSurname='$secondSurname',indicativo='$indicativo',phone='$phone',direccion='$direccion',idCiudad='$idCiudad' WHERE idUsuario='$id' AND docType='$docType'";
echo $sql;
$query=mysqli_query($con,$sql);

    if($query){
        echo "valores cambiados exitosamente";
        Header("Location: index.php");
    }
    else{
        echo "Pendejo";
    }
?>
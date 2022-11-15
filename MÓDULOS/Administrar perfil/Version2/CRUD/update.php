<?php

include("conexion.php");
$con=conectar();

$numeroDocumento=$_POST['numeroDocumento'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$celular=$_POST['celular'];
$correo=$_POST['correo'];


$sql="UPDATE usuario SET  nombre='$nombre',apellido='$apellido',celular='$celular',correo='$correo' WHERE numeroDocumento='$numeroDocumento'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: index.php");
    }
?>

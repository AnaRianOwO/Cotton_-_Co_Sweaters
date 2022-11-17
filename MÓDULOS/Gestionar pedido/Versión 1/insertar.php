<?php
include("../conexion.php");


$idFactura = $_POST['idFactura'];
$idUsuario = $_POST['idUsuario'];
$fecha = $_POST['fecha'];
$codigo = $_POST['codigo'];
$cantidad = $_POST['cantidad'];
$total = $_POST['total'];
$obser = $_POST['obser'];

$sql="INSERT INTO factura VALUES('F$idFactura','$idUsuario','$fecha','$codigo','$cantidad','$total','$obser')";
$query= mysqli_query($con,$sql);

if($query){
    Header("Location: index.php");
    
}else {
    echo "Error con la insercion de base de datos";
}
?>
<?php

include("conexion.php");


$idFactura = $_POST['idFactura'];
$idUsuario = $_POST['idUsuario'];
$fecha = $POST['fecha'];
$codigo = $_POST['codigo'];
$cantidad = $_POST['cantidad'];
$total = $_POST['total'];
$obser = $_POST['obser'];

$sql="UPDATE factura SET  idFactura='$idFactura',idUsuario='$idUsuario',fecha='$fecha',codigo='$codigo',cantidad='$cantidad',total='$total',obser='$obser' WHERE idFactura='$idFactura'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: alumno.php");
    }
?>
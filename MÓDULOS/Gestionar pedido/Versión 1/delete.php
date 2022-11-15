<?php

include("../conexion.php");


$idFactura=$_GET['id'];

$sql="DELETE FROM factura WHERE idFactura='$idFactura'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: index.php");
    }
?>

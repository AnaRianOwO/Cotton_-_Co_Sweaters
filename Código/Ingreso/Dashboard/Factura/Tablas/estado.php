<?php 
include("../../../../DB/db.php");
extract($_POST);
$consulta="UPDATE factura F SET F.idEstado = '$idEstado' WHERE F.idFactura = '$idFactura'";
echo $consulta;
mysqli_query($DB, $consulta);
header('Location: ../factura.php');
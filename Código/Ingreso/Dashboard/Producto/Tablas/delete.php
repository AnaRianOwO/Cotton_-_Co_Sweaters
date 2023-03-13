<?php

include("../../../../DB/db.php");

$codigo=$_GET['codigo'];

$sql="UPDATE producto p SET idEstado=2 WHERE P.codigo='$codigo'";
$query=mysqli_query($DB,$sql);

    if($query){
        Header("Location: ../productos.php");
    }
?>
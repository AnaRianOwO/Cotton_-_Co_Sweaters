<?php

include("../conexion.php");


$codigo=$_GET['id'];

$sql="DELETE FROM producto  WHERE codigo='$codigo'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: index.php");
    }
?>
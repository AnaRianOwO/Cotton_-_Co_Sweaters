<?php

include("../../../DB/db.php");

$codigo=$_GET['id'];

$sql="DELETE FROM producto  WHERE codigo='$codigo'";
$query=mysqli_query($DB,$sql);

    if($query){
        Header("Location: productos.php");
    }
?>
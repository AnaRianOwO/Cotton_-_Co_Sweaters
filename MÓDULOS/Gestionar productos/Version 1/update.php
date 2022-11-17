<?php

include("../conexion.php");


$codigo=$_POST['codigo'];
$nameProducto=$_POST['nameProducto'];
$precio=$_POST['precio'];
$stock=$_POST['stock'];
$des=$_POST['descripcion'];
$talla=$_POST['talla'];
$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

$sql="UPDATE producto SET $nameProducto='nameProducto',$precio='precio',$stock='stock',$descripcion='descripcion',$talla='talla',$imagen='imagen','1' WHERE $codigo='codigo'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: index.php");
    }
?>
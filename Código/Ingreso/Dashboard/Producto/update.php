<?php

include("../../../DB/db.php");


$codigo=$_POST['codigo'];
$nameProducto=$_POST['nameProducto'];
$precio=$_POST['precio'];
$stock=$_POST['stock'];
$des=$_POST['descripcion'];
$idEstado = $_POST['idEstado'];
$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

$sql="UPDATE producto SET $nameProducto='nameProducto',$precio='precio',$stock='stock',$des='descripcion',$imagen='imagen',$idEstado='idEstado' WHERE $codigo='codigo'";
$query=mysqli_query($DB,$sql);

    if($query){
        Header("Location: productos.php");
    }else{
        
    }
?>
<?php
include("../../../DB/db.php");


$codigo = $_POST['codigo'];
$nameProducto = $_POST['nameProducto'];
$precio = $_POST['precio'];
$stock = $_POST['stock'];
$descripcion = $_POST['descripcion'];
$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));


$sql="INSERT INTO producto VALUES('P$codigo','$nameProducto','$precio','$stock','$descripcion','$imagen','1')";
$query= mysqli_query($DB,$sql);

if($query){
    Header("Location: productos.php");
}else {
    echo "Error con la insercion de base de datos";
}
?>
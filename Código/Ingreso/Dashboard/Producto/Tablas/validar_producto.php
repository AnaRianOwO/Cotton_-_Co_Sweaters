<?php
include("../../../../DB/db.php");

$codigo = $_POST['codigo'];
$nameProducto = $_POST['nameProducto'];
$precio = $_POST['precio'];
$stock = $_POST['stock'];
$descripcion = $_POST['descripcion'];
$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
$idEstado = $_POST['idEstado'];

$sql="INSERT INTO producto VALUES('$codigo','$nameProducto','$precio','$stock','$descripcion','$imagen','$idEstado')";
$query= mysqli_query($DB,$sql);

if($query){
    Header("Location: ../productos.php");
}else {
    echo "Error con la insercion de base de datos";
}
?>
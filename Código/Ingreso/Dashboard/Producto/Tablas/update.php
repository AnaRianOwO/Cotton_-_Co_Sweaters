<?php

//include("../../../../DB/db.php");
//
//$codigo=$_POST['codigo'];
//$nameProducto=$_POST['nameProducto'];
//$precio=$_POST['precio'];
//$stock=$_POST['stock'];
//$des=$_POST['descripcion'];
//$idEstado = $_POST['idEstado'];
////$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
//
//$sql="UPDATE producto SET nameProducto = '$nameProducto', precio = '$precio', stock = '$stock',
//descripcion = '$des',/*$imagen='imagen'*/idEstado = '$idEstado' WHERE codigo = '$codigo'";
//$query=mysqli_query($DB,$sql);
//
//    if($query){
//        Header("Location: ../productos.php");
//    }else{
//        
//    }
?>

<?php
   
require_once ("../../../../DB/db.php");


if (isset($_POST['accion'])){ 
    switch ($_POST['accion']){

        case 'editar_registro':
            editar_registro();
		}

	}

    function editar_registro() {
		$DB=mysqli_connect("localhost","root","","cotton");
		extract($_POST);
		$consulta="UPDATE producto SET nameProducto = '$nameProducto', precio = '$precio', stock = '$stock',
        descripcion = '$descripcion',/*$imagen='imagen'*/idEstado = '$idEstado' WHERE codigo = '$codigo'"; 
        
		mysqli_query($DB, $consulta);
		header('Location: ../productos.php');

}
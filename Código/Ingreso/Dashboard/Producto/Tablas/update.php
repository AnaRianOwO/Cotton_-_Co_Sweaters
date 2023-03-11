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
        descripcion = '$descripcion', /*imagen = '$imagen'*/, idEstado = '$idEstado' WHERE codigo = '$codigo'"; 
        
		mysqli_query($DB, $consulta);
		header('Location: ../productos.php');

}
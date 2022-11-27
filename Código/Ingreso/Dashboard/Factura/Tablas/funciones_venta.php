<?php
   
require_once ("../../../../DB/db.php");


if (isset($_POST['accion'])){ 
    switch ($_POST['accion']){

        case 'editar_registro':
            editar_registro();
            break; 

            case 'eliminar_registro';
            eliminar_registro();
    
            break;
		}

	}

    function editar_registro() {
		extract($_POST);
		$consulta="UPDATE administrador SET firstName = '$firstName', secondName = '$secondName',
		surname ='$surname', secondSurname ='$secondSurname', indicativo ='$indicativo', phone ='$phone', 
        correo ='$correo', direccion='$direccion', idCiudad='$idCiudad', idEstado='$idEstado' WHERE idAdministrador = '$idAdministrador' "; 
        
		mysqli_query($DB, $consulta);
		header('Location: ../administrador.php');

}

function eliminar_registro() {
    extract($_POST);
    $idAdministrador= $_POST['idAdministrador'];
    $consulta= "DELETE FROM administrador WHERE idAdministrador= $idAdministrador";

    mysqli_query($DB, $consulta);


    header('Location: ../administrador.php');

}
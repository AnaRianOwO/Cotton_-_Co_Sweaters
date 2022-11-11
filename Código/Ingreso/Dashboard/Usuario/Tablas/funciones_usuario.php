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
		$DB=mysqli_connect("localhost","root","","cotton");
		extract($_POST);
		$consulta="UPDATE usuario SET firstName = '$firstName', secondName = '$secondName',
		surname ='$surname', secondSurname ='$secondSurname', indicativo ='$indicativo', phone ='$phone', 
        correo ='$correo', direccion='$direccion', idCiudad='$idCiudad', idEstado='$idEstado' WHERE idUsuario = '$idUsuario' "; 
        
		mysqli_query($DB, $consulta);
		header('Location: ../usuarios.php');

}

function eliminar_registro() {
    $DB=mysqli_connect("localhost","root","","cotton");
    extract($_POST);
    $idUsuario= $_POST['idUsuario'];
    $consulta= "DELETE FROM usuario WHERE idUsuario= $idUsuario";

    mysqli_query($DB, $consulta);


    header('Location: ../usuarios.php');

}
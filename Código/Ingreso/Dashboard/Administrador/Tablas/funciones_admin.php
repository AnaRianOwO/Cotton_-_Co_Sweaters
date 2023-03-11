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
        include("../../../../DB/db.php");
        extract($_POST);
		$consulta="UPDATE persona P SET P.firstName = '$firstName', P.secondName = '$secondName', P.surname ='$surname', P.secondSurname ='$secondSurname', P.indicativo ='$indicativo', P.phone ='$phone', P.correo ='$correo', P.idCiudad='$idCiudad', P.idEstado='$idEstado' WHERE P.id_persona = '$id_persona' AND P.docType = '$docType'";
        // echo $consulta;
		mysqli_query($DB, $consulta);
		header('Location: ../administrador.php');

}

//function eliminar_registro() {
//    include("../../../../DB/db.php");
//    extract($_POST);
//    $id_persona= $_POST['id_persona'];
//    $consulta= "DELETE FROM administrador WHERE id_persona= $id_persona";
//
//    mysqli_query($DB, $consulta);
//
//
//    header('Location: ../administrador.php');
//
//}
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
        include("../../../../DB/db.php");		extract($_POST);
		$consulta="UPDATE administrador A INNER JOIN persona P on A.id_persona=P.id_persona INNER JOIN ciudad C on C.idCiudad=P.idciudad SET P.firstName = '$firstName', P.secondName = '$secondName',
		P.surname ='$surname', P.secondSurname ='$secondSurname', P.indicativo ='$indicativo', P.phone ='$phone', 
        P.correo ='$correo', C.idCiudad='$idCiudad', P.idEstado='$idEstado' WHERE A.idAdministrador = '$idAdministrador' ";
        
		mysqli_query($DB, $consulta);
		header('Location: ../administrador.php');

}

function eliminar_registro() {
    include("../../../../DB/db.php");
    extract($_POST);
    $idAdministrador= $_POST['idAdministrador'];
    $consulta= "DELETE FROM administrador WHERE idAdministrador= $idAdministrador";

    mysqli_query($DB, $consulta);


    header('Location: ../administrador.php');

}
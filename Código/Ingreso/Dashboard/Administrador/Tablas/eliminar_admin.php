<?php
    include("../../../../DB/db.php");

    $idAdministrador= $_GET['id_persona'];
    $docType= $_GET['docType'];
    //$consulta= mysqli_query($DB,"DELETE FROM administrador WHERE idAdministrador= '$idAdministrador'");
    $consulta= mysqli_query($DB,"DELETE FROM administrador WHERE id_persona = '$idAdministrador' AND docType = '$docType';");
    
    if($consulta){
        $consulta2 = mysqli_query($DB,"DELETE FROM persona WHERE id_persona = '$idAdministrador' AND docType = '$docType';");
    } else {
        echo "Error: ".$consulta."<br>".mysqli_error($DB);
    }

    header('Location: ../administrador.php');
?>    
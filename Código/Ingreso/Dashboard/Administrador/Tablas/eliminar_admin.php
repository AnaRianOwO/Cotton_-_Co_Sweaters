<?php
    include("../../../../DB/db.php");

    $idAdministrador= $_GET['idAdministrador'];
    //$consulta= mysqli_query($DB,"DELETE FROM administrador WHERE idAdministrador= '$idAdministrador'");
    $consulta= mysqli_query($DB,"DELETE A, P FROM persona As P INNER JOIN administrador AS A WHERE P.id_persona='$id_persona' AND A.docType= '$docType';");
    header('Location: ../administrador.php');
?>    
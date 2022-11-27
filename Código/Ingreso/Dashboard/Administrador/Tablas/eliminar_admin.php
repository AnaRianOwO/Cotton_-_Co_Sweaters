<?php
    include("../../../../DB/db.php");

    $idAdministrador= $_GET['idAdministrador'];
    $consulta= mysqli_query($DB,"DELETE FROM administrador WHERE idAdministrador= '$idAdministrador'");

    header('Location: ../administrador.php');   
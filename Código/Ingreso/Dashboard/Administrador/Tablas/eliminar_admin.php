<?php
    include("../../../../DB/db.php");

    $idAdministrador= $_GET['idAdministrador'];
    $consulta= mysqli_query($conexion,"DELETE FROM administrador WHERE idAdministrador= '$idAdministrador'");

    header('Location: ../administrador.php');   
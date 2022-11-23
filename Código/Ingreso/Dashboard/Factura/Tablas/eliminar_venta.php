<?php

    $idAdministrador= $_GET['idAdministrador'];
    $conexion=mysqli_connect("localhost","root","","cotton");
    $consulta= mysqli_query($conexion,"DELETE FROM administrador WHERE idAdministrador= '$idAdministrador'");

    header('Location: ../factura.php');   
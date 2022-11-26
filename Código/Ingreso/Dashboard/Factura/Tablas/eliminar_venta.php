<?php
    require_once ("../../../../DB/db.php");

    $idAdministrador= $_GET['idAdministrador'];
    $conexion=mysqli_connect("localhost","root","","cotton");
    $consulta= mysqli_query($DB,"DELETE FROM administrador WHERE idAdministrador= '$idAdministrador'");

    header('Location: ../factura.php');   
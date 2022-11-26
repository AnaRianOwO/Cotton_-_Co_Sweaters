<?php
    require_once ("../../../../DB/db.php");

    $idFactura= $_GET['idFactura'];
    $conexion=mysqli_connect("localhost","root","","cotton");
<<<<<<< HEAD
    $consulta= mysqli_query($DB,"DELETE FROM administrador WHERE idAdministrador= '$idAdministrador'");
=======
    $consulta= mysqli_query($conexion,"DELETE FROM detallefactura WHERE idFactura= '$idFactura'");
    $consulta= mysqli_query($conexion,"DELETE FROM factura WHERE idFactura= '$idFactura'");
>>>>>>> origin/main

    header('Location: ../factura.php');   
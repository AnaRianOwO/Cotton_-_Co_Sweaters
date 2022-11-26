<?php

    $idFactura= $_GET['idFactura'];
    $conexion=mysqli_connect("localhost","root","","cotton");
    $consulta= mysqli_query($conexion,"DELETE FROM detallefactura WHERE idFactura= '$idFactura'");
    $consulta= mysqli_query($conexion,"DELETE FROM factura WHERE idFactura= '$idFactura'");

    header('Location: ../factura.php');   
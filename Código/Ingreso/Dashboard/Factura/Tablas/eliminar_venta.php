<?php
    require_once ("../../../../DB/db.php");

    $idFactura= $_GET['idFactura'];
    $conexion=mysqli_connect("localhost","root","","cotton");
    $consulta= mysqli_query($DB,"DELETE FROM detallefactura WHERE idFactura= '$idFactura'");
    $consulta= mysqli_query($DB,"DELETE FROM factura WHERE idFactura= '$idFactura'");

    header('Location: ../factura.php');   
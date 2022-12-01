<?php

    $idUsuario= $_GET['idUsuario'];
    $conexion=mysqli_connect("localhost","root","","cotton");
    $consulta= mysqli_query($conexion,"DELETE FROM usuario WHERE idUsuario= '$idUsuario'");

    header('Location: ../usuarios.php');   
<?php
    require_once ("../../../../DB/db.php");

    $id_persona= $_GET['id_persona'];
    $conexion=mysqli_connect("localhost","root","","cotton");
    //$consulta= mysqli_query($DB,"DELETE FROM usuario WHERE id_persona= '$id_persona'");
    $consulta= mysqli_query($DB,"DELETE U, P FROM persona As P INNER JOIN usuario AS U ON U.id_persona=P.id_persona AND U.docType=P.docType WHERE P.id_persona='$id_persona' AND P.docType= '$docType';");

    header('Location: ../usuarios.php');
?> 
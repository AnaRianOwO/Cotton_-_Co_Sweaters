<?php
    require_once ("../../../../DB/db.php");

    $id_persona= $_GET['id_persona'];
    $docType= $_GET['docType'];
    $conexion=mysqli_connect("localhost","root","","cotton");
    //$consulta= mysqli_query($DB,"DELETE FROM usuario WHERE id_persona= '$id_persona'");
    $consulta= mysqli_query($DB,"UPDATE persona P SET P.idEstado=2 WHERE P.id_persona='$id_persona' AND P.docType= '$docType';");

    header('Location: ../usuarios.php');
?> 
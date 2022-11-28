<?php

    include "../../DB/db.php";
    $correo = $_POST['correo'];
    $p1 = $_POST['p1'];
    $p2 = $_POST['p2'];

    if($p1 == $p2){
        $p1 = password_hash($p1, PASSWORD_DEFAULT);
        $DB -> query("UPDATE usuario SET pass = '$p1' WHERE correo = '$correo'") or die($DB -> error);
        echo "<script>alert('Contraseña actualizada');window.location='../index.php'</script>";
    }else{
        echo "Las contraseñas no coinciden";
    }

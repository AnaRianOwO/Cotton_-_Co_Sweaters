<?php

    $DB = new mysqli("localhost", "root", "", "cotton");

    if ($DB->connect_errno){
        echo "No hay conexión: (".$DB->connect_errno.")".$DB->connect_error;
    }

    $nombre = ($_POST['nombre']);
    $apellido = ($_POST['apellido']);
    $correo =($_POST['correo']);
    $clave =($_POST['clave']);

    if(isset($_POST['btn_registrar'])){
        $pass_cifrada = password_hash($clave, PASSWORD_DEFAULT);
        $query_registrar = "INSERT INTO usuario(nombre, apellido, correo, clave) values ('$nombre', '$apellido', '$correo', '$pass_cifrada')";

        if(mysqli_query($DB, $query_registrar)){

            echo "<script>alert('Usuario registrado: $nombre');window.location='index.html'</script>";
        }else{
            echo "Error: ".$query_registrar."<br>".mysqli_error($DB);
        }
    }


?>


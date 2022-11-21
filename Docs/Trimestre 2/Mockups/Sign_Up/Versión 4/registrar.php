¿<?php
    $DB = new mysqli("localhost", "root", "", "cotton");

    if ($DB->connect_error){
        echo "No hay conexión: (".$DB->connect_error.")".$DB->connect_error;
    }

    $idUsuario = ($_POST['idUsuario']);
    $docType = ($_POST['docType']);
    $name = ($_POST['name']);
    $secondName = ($_POST['secondName']);
    $surname = ($_POST['surname']);
    $secondSurname = ($_POST['secondSurname']);
    $indicativo = ($_POST['indicativo']);
    $phone = ($_POST['phone']);
    $correo = ($_POST['correo']);
    $pass = ($_POST['pass']);
    $idCiudad = ($_POST['idCiudad']);

    if(isset($_POST['btn_registrar'])){
        $pass_cifrada = password_hash($pass, PASSWORD_DEFAULT);
        $query = "INSERT INTO usuario VALUES 
        ('$idUsuario','$docType','$name','$secondName','$surname','$secondSurname',
        '$indicativo','$phone','$correo','$pass_cifrada','D001','$idCiudad','1')";
¿<?php
    $DB = new mysqli("localhost", "root", "", "cotton");

    if ($DB->connect_error){
        echo "No hay conexión: (".$DB->connect_error.")".$DB->connect_error;
    }

    $idUsuario = ($_POST['idUsuario']);
    $docType = ($_POST['docType']);
    $name = ($_POST['name']);
    $secondName = ($_POST['secondName']);
    $surname = ($_POST['surname']);
    $secondSurname = ($_POST['secondSurname']);
    $indicativo = ($_POST['indicativo']);
    $phone = ($_POST['phone']);
    $correo = ($_POST['correo']);
    $pass = ($_POST['pass']);
    $idCiudad = ($_POST['idCiudad']);

    if(isset($_POST['btn_registrar'])){
        $pass_cifrada = password_hash($pass, PASSWORD_DEFAULT);
        $query = "INSERT INTO usuario VALUES 
        ('$idUsuario','$docType','$name','$secondName','$surname','$secondSurname',
        '$indicativo','$phone','$correo','$pass_cifrada','D001','$idCiudad','1')";

        if(mysqli_query($DB, $query)){
            echo "<script>alert('Usuario registrado: $name');window.location='registro.html'</script>";
        }else{
            echo "Error: ".$query."<br>".mysqli_error($DB);
        }
    }
?>
        if(mysqli_query($DB, $query)){
            echo "<script>alert('Usuario registrado: $name');window.location='registro.html'</script>";
        }else{
            echo "Error: ".$query."<br>".mysqli_error($DB);
        }
    }
?>
<?php
    
    include("../DB/db.php");
    
    //Registrar usuario
    if(isset($_POST['btn_registrar'])){

        $idUsuario = mysqli_real_escape_string($DB, $_POST['idUsuario']);
        $docType = mysqli_real_escape_string($DB, $_POST['docType']);
        $name = mysqli_real_escape_string($DB, $_POST['name']);
        $secondName = mysqli_real_escape_string($DB, $_POST['secondName']);
        $surname = mysqli_real_escape_string($DB, $_POST['surname']);
        $secondSurname = mysqli_real_escape_string($DB, $_POST['secondSurname']);
        $indicativo = mysqli_real_escape_string($DB, $_POST['indicativo']);
        $phone = mysqli_real_escape_string($DB, $_POST['phone']);
        $correo = mysqli_real_escape_string($DB, $_POST['correo']);
        $direccion = mysqli_real_escape_string($DB, $_POST['direccion']);
        $pass = mysqli_real_escape_string($DB, $_POST['pass']);
        $idCiudad = mysqli_real_escape_string($DB, $_POST['idCiudad']);
        $pass_cifrada = password_hash($pass, PASSWORD_DEFAULT);
        $sql_user = "SELECT idUsuario, docType FROM usuario WHERE idUsuario = '$idUsuario' and docType  = '$docType'";
        $resultado_user = $DB->query($sql_user);
        $filas = $resultado_user->num_rows;
        if ($filas > 0) {
            echo "<script>alert('El usuario ya existe');window.location='index.php'</script>";
        }else{
        $query_usuario = "INSERT INTO usuario VALUES 
        ('$idUsuario','$docType','$name','$secondName','$surname','$secondSurname',
        '$indicativo','$phone','$correo','$direccion','$pass_cifrada','$idCiudad','1')";

        $resultado_usuario = $DB->query($query_usuario);
        if($resultado_usuario > 0){
            echo "<script>alert('Usuario registrado: $name');window.location='index.php'</script>";
        }else{
            echo "Error: ".$query."<br>".mysqli_error($DB);
        }
        }
    }
?>
<?php

    $DB = new mysqli("localhost", "root", "", "cotton");

    if ($DB->connect_errno){
        echo "No hay conexión: (".$DB->connect_errno.")".$DB->connect_error;
    }
    $correo=$_POST['correo'];
    $clave=$_POST['clave'];
    session_start();
    $_SESSION['correo']=$correo;


    $query_admin="SELECT * FROM administrador where correo = '$correo' and clave= '$clave'";
    $resultado=mysqli_query($DB,$query_admin);

    $filas=mysqli_num_rows($resultado);

    if(isset($_POST['btn_login_admin'])){

        if($filas){
            header("Location: mvcUSU/index.php");

        }else{
            echo "<script>alert('Usuario o contraseña incorrecta');window.location='index.html'</script>";
        }
    }
?>

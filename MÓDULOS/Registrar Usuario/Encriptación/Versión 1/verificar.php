<?php

    $DB = new mysqli("localhost", "root", "", "cotton");

    if ($DB->connect_errno){
        echo "No hay conexión: (".$DB->connect_errno.")".$DB->connect_error;
    }

    $correo = $_POST['correo'];
    $clave = $_POST['clave'];
    session_start();
    $_SESSION['correo']=$correo;


    if(isset($_POST['btn_login'])){

        $query_login = mysqli_query($DB, "SELECT * FROM usuario WHERE correo = '$correo'");
        $nr = mysqli_num_rows($query_login);
        $buscar_pass = mysqli_fetch_array($query_login);

        if(($nr == 1) && (password_verify($clave, $buscar_pass['clave']))){

            header("Location: Perfil/index.html" );

        }else{
            echo "<script>alert('Usuario o contraseña incorrecta');window.location='index.html'</script>";
        }
    }

/*--------------------------------ADMIN---------------------------------------------
    if(isset($_POST['btn_login_admin'])){

        $query_login = mysqli_query($DB, "SELECT * FROM usuarios where administrador= '$correo' and clave= '$clave'");
        $nr = mysqli_num_rows($query_login);

        if(($nr == 1)){

            header("Location: sistema/index.html" );

        }else{
            echo "<script>alert('Usuario o contraseña incorrecta');window.location='index.html'</script>";
        }
    }*/
?>

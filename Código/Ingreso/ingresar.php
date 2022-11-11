<?php
   
    include('../DB/db.php');
    
    $correo=$_POST['correo'];   
    $pass = $_POST['pass'];

    $consul = mysqli_query($DB,"SELECT * FROM usuario WHERE correo = '$correo'");
    $data = mysqli_fetch_array($consul);

        session_start();

        $_SESSION['idUsuario'] = $data['idUsuario'];
    
    if(isset($_POST['btn_login'])){

        $query_login = "SELECT * FROM usuario WHERE correo = '$correo'";
        $resultado = mysqli_query($DB, $query_login);
        $nr = mysqli_num_rows($resultado);

        $buscar_pass = mysqli_fetch_array($resultado);

        if(($nr == 1) && (password_verify($pass, $buscar_pass['pass']))){

            header("Location: Perfil/index.php");
        }else{
            echo "<script>alert('Usuario o contraseña incorrecta');window.location='index.php'</script>";
        }
  
 }




    
/*
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
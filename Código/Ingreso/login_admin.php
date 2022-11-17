<?php

include('../DB/db.php');
    $correo=$_POST['correo'];   
    $pass = $_POST['pass'];

    $consul = mysqli_query($DB,"SELECT * FROM administrador WHERE correo = '$correo'");
    $data = mysqli_fetch_array($consul);

        session_start();
        $_SESSION['idAdministrador'] = $data['idAdministrador'];
    
    if(isset($_POST['btn_login'])){

        $query_login = "SELECT * FROM administrador WHERE correo = '$correo'";
        $resultado = mysqli_query($DB, $query_login);
        $nr = mysqli_num_rows($resultado);

        $buscar_pass = mysqli_fetch_array($resultado);

        if(($nr == 1) && (password_verify($pass, $buscar_pass['pass']))){

            header("Location: Dashboard/dashboard.php");
        }else{
            echo "<script>alert('Usuario o contraseña incorrecta');window.location='index.php'</script>";
        }
  
 }

?>
<?php

    error_reporting(0);

    include('../DB/db.php');
    
    $correo=$_POST['correo'];   
    $pass = $_POST['pass'];

    $consul = mysqli_query($DB,"SELECT * FROM persona P INNER JOIN usuario U ON P.id_persona = U.id_persona and P.docType=U.docType WHERE P.correo = '$correo' AND idEstado='1'");
    $data = mysqli_fetch_array($consul);
    // $exist = mysqli_num_rows($consul);

        session_start();

        $_SESSION['idUsuario'] = $data['id_persona'];
        $_SESSION['docType'] = $data['docType'];
    
    if(isset($_SESSION['idUsuario'])){
        header("Location: Perfil/Usu_Per/index.php");
    } else {
        
    }

    if(isset($_POST['btn_login'])){

        $nr = mysqli_num_rows($consul);

        // $buscar_pass = mysqli_fetch_array($consul);

        if(($nr == 1) && (password_verify($pass, $data['pass']))){
            header("Location: Perfil/Usu_Per/index.php");
        }else{
            echo "
                .
                <html>
                    <script src='https://unpkg.com/sweetalert2@9.5.3/dist/sweetalert2.all.min.js'></script>
                <html>
                <script>
                    Swal
                        .fire({
                            title: 'Contraseña o correo incorrectos',
                            text: 'Porfavor verifique si la informacion es correcta',
                            icon: 'error',
                            confirmButtonText: 'Continuar'
                        })
                        .then(resultado => {
                            if (resultado.value) {
                                window.location='index.php';
                            }else {    
                            }
                        });
                </script>";
            // echo "<script>alert('Usuario o contraseña incorrecta');window.location='index.php'</script>";
        }
  
 }

?>
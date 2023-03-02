<?php

include('../DB/db.php');
    $correo=$_POST['correo'];   
    $pass = $_POST['pass'];

    $consul = mysqli_query($DB,"SELECT * FROM persona P INNER JOIN administrador A ON P.id_persona=A.id_persona AND P.docType = A.docType WHERE P.correo = '$correo'");
    $data = mysqli_fetch_array($consul);

        session_start();
        $_SESSION['idAdministrador'] = $data['id_persona'];
    
    if(isset($_POST['btn_login'])){

        $nr = mysqli_num_rows($consul);

        //$buscar_pass = mysqli_fetch_array($consul);

        if(($nr == 1) && (password_verify($pass, $data['pass']))){

            header("Location: Dashboard/dashboard.php");
        }else{
            echo "
                    .
                    <html>
                        <script src='https://unpkg.com/sweetalert2@9.5.3/dist/sweetalert2.all.min.js'></script>
                    <html>
                    <script>
                        Swal
                            .fire({
                                title: 'Ha ocurrido un error',
                                text: 'Por favor verifique su información',
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
        }
  
 }

?>
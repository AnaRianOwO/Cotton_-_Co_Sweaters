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
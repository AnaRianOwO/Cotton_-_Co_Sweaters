<?php
include('../../../Db/db.php');
session_start();
$idUsuario = $_SESSION['idUsuario'];
$docType = $_SESSION['docType'];

$consul = mysqli_query($DB,"SELECT * FROM persona P INNER JOIN usuario U ON P.id_persona = U.id_persona and P.docType=U.docType WHERE P.correo = '$correo' AND idEstado='1'");
$data = mysqli_fetch_array($consul);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://unpkg.com/sweetalert2@9.5.3/dist/sweetalert2.all.min.js'></script>
    <title>Validacion</title>
</head>
<body>
    <script>
        Swal
            .fire({
                title: 'Validacion del usuario',
                text: 'Porfavor ingrese su contraseña para verificar',
                input: 'text',
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: 'Sí, quiero generar mi factura',
                cancelButtonText: 'Cancelar',
            })
            .then(resultado => {
                if (resultado.value) {
                    <?php $pass = ?>resultado.value<?php ; ?>
                    <?php if(password_verify($pass, $data['pass'])){
                        $update = mysqli_query($DB,"UPDATE `persona` SET `idEstado` = '0' WHERE `persona`.`id_persona` = '$idUsuario' AND `persona`.`docType` = '$docType'");
                        if($update){
                            header('Location: index.php');
                        }else{
                            echo "<script>alert('Ha ocurrido un error');</script>";
                        }
                    } ?>
                }else {    
                }
            });
    </script>";
</body>
</html>